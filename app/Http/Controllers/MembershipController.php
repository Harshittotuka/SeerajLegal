<?php

namespace App\Http\Controllers;
use app\Repositories\MembershipRepository;
use Illuminate\Http\Request;
use App\Services\MembershipService;
use App\Models\Membership;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentLinkMail;

class MembershipController extends Controller
{
    protected $membershipService;

    public function __construct(MembershipService $membershipService)
    {
        $this->membershipService = $membershipService;
    }

    public function showPaymentPage($id)
    {
        $member = Membership::with('type')->findOrFail($id);

        return view('emails.payment', [
            'member' => $member,
            'membershipType' => $member->type->membershipType ?? 'N/A',
            'price' => $member->type->price ?? 'N/A',
            'duration' => $member->type->duration ?? 'N/A',
        ]);
    }

    public function index()
    {
        $members = Membership::all();
        return response()->json(['data' => $members]);
    }

    public function pending()
    {
        $members = Membership::where('status', 'Pending')->get();
        return response()->json(['data' => $members]);
    }
    public function pendingCount()
    {
        $count = \App\Models\Membership::where('status', 'Pending')->count();
        return response()->json(['pending_count' => $count]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'aadharName' => 'required',
            'aadharNumber' => 'required',
            'aadharImage' => 'nullable|file|image',
            'panName' => 'required',
            'panNumber' => 'required',
            'panImage' => 'nullable|file|image',
            'degreeProof' => 'nullable|file|mimes:pdf',
            'certificationProof' => 'nullable|file|mimes:pdf',
            'membershipType' => 'required',
        ]);

        // // Save uploaded files
        // $data['aadhar_image'] = $request->file('aadharImage')?->getClientOriginalName();
        // $data['pan_image'] = $request->file('panImage')?->getClientOriginalName();
        // $data['degree_proof'] = $request->file('degreeProof')?->getClientOriginalName();
        // $data['certification_proof'] = $request->file('certificationProof')?->getClientOriginalName();

        // Set default status
        $data['status'] = 'pending';

        // Save to DB
        $membership = Membership::create($data);

        return response()->json(
            [
                'status' => true,
                'message' => 'Membership application submitted successfully.',
                'membership_id' => $membership->id,
                'data' => $membership,
            ],
            201,
        );
    }

    public function approve($id)
    {
        try {
            $membership = Membership::findOrFail($id);
            $membership->status = 'approved';
            $membership->save();

            // Generate payment link route
            $paymentLink = route('membership.payment', ['id' => $membership->id]);

            // Send mail via queue
            if (config('queue.default') !== 'sync') {
                Mail::to($membership->email)->queue(new PaymentLinkMail($membership->firstName, $paymentLink));
            } else {
                // fallback in case queue is not configured
                Mail::to($membership->email)->send(new PaymentLinkMail($membership->firstName, $paymentLink));
            }

            return response()->json(['message' => 'Membership approved. Payment link sent to member\'s email.']);
        } catch (\Exception $e) {
            Log::error('Approval or email failed: ' . $e->getMessage());

            return response()->json(
                [
                    'message' => 'Failed to approve membership or send email.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    // Admin rejection
    public function reject($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->status = 'rejected';
        $membership->save();

        return response()->json(['message' => 'Membership rejected.']);
    }

    public function getAllMembers()
    {
        $members = $this->membershipService->getAllMembers();
        return response()->json($members, 200);
    }
    // Create Member
    public function createMember(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'membershipType' => 'required|string',
        ]);

        $member = $this->membershipService->createMember($request->all());

        return response()->json(
            [
                'success' => true,
                'message' => 'Member created successfully!',
                'data' => $member,
            ],
            201,
        );
    }

    // Delete Member
    public function deleteMember($id)
    {
        $deleted = $this->membershipService->deleteMember($id);

        if (!$deleted) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Member not found!',
                ],
                404,
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Member deleted successfully!',
            ],
            200,
        );
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'membershipType' => 'required|string',
        ]);

        $updatedMember = $this->membershipService->updateMember($id, $request->all());

        if (!$updatedMember) {
            return response()->json(['success' => false, 'message' => 'Member not found'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Member updated successfully', 'data' => $updatedMember]);
    }
}
