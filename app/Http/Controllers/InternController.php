<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class InternController extends Controller
{
    public function index()
    {
        try {
            $interns = Intern::all();
            return response()->json(['success' => true, 'data' => $interns]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch interns.', 'error' => $e->getMessage()], 500);
        }
    }

 public function store(Request $request)
{
    try {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:interns',
            'phone' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'pincode' => 'required|string',
            'collegeName' => 'required|string',
            'degree' => 'required|string',
            'graduationYear' => 'required|date_format:Y',
            'membershipType' => 'required|string',
            'coverLetter' => 'required|string',
            'resume' => 'required|file|mimes:pdf|max:2048', // Only PDF, Max 2MB
            'status' => 'nullable|string',
        ]);

        // Fetch price from the internship_types table based on membershipType
        $membershipType = $data['membershipType'];
        $internshipType = \App\Models\InternshipType::where('type', $membershipType)->first();

        if ($internshipType) {
            // Get the price for the selected membership type
            $price = $internshipType->price;
        } else {
            // Default price or handle error if type doesn't exist
            $price = null;
        }

        // First, create the intern without resumePath
        $intern = Intern::create([
            ...$data,
            'price' => $price,  // Add price to the intern record
            'resumePath' => '', // temporarily empty
        ]);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');

            // Create a custom file name
            $firstName = preg_replace('/\s+/', '', strtolower($data['firstName']));
            $lastName = preg_replace('/\s+/', '', strtolower($data['lastName']));
            $fileName = "resume_{$firstName}{$lastName}_{$intern->id}.pdf";

            // Destination path (public/assets/dynamic/resumes)
            $destinationPath = public_path('assets/dynamic/resumes');

            // Create the directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move file to public/assets/dynamic/resumes
            $file->move($destinationPath, $fileName);

            // Define the file path relative to the public directory
            $filePath = 'assets/dynamic/resumes/' . $fileName;

            // Update the intern record with the file path
            $intern->update([
                'resumePath' => $filePath,
            ]);
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Resume upload failed.',
                ],
                400
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Intern created successfully.',
                'data' => $intern,
            ],
            201
        );
    } catch (ValidationException $e) {
        return response()->json(['success' => false, 'errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to create intern.', 'error' => $e->getMessage()], 500);
    }
}

    
    public function update(Request $request, $id)
    {
        try {
            $intern = Intern::findOrFail($id);

            // 1) Validate
            $data = $request->validate([
                'firstName' => 'sometimes|string',
                'lastName' => 'sometimes|string',
                'email' => 'sometimes|email|unique:interns,email,' . $id,
                'phone' => 'sometimes|string',
                'dob' => 'sometimes|date',
                'address' => 'sometimes|string',
                'city' => 'sometimes|string',
                'state' => 'sometimes|string',
                'country' => 'sometimes|string',
                'pincode' => 'sometimes|string',
                'collegeName' => 'sometimes|string',
                'degree' => 'sometimes|string',
                'graduationYear' => 'sometimes|date_format:Y',
                'membershipType' => 'sometimes|string',
                'coverLetter' => 'sometimes|string',
                'resume' => 'sometimes|file|mimes:pdf|max:2048',
                'status' => 'sometimes|string',
            ]);

            // 2) Compute sanitized name parts
            $newFirst = isset($data['firstName']) ? preg_replace('/\s+/', '', strtolower($data['firstName'])) : preg_replace('/\s+/', '', strtolower($intern->firstName));

            $newLast = isset($data['lastName']) ? preg_replace('/\s+/', '', strtolower($data['lastName'])) : preg_replace('/\s+/', '', strtolower($intern->lastName));

            $newFileName = "resume_{$newFirst}{$newLast}_{$intern->id}.pdf";
            $publicDirPath = public_path('assets/dynamic/resumes');
            $newRelPath = "assets/dynamic/resumes/{$newFileName}";

            // 3) If a new file was uploaded → delete old & move new
            if ($request->hasFile('resume')) {
                // Delete old file if it exists
                if ($intern->resumePath && file_exists(public_path($intern->resumePath))) {
                    unlink(public_path($intern->resumePath));
                }

                // Ensure target directory exists
                if (!file_exists($publicDirPath)) {
                    mkdir($publicDirPath, 0755, true);
                }

                // Move the uploaded file into public/assets/dynamic/resumes
                $request->file('resume')->move($publicDirPath, $newFileName);

                // Update DB path
                $data['resumePath'] = $newRelPath;
            }
            // 4) Else if name changed but no new file → rename existing file
            elseif (($request->filled('firstName') || $request->filled('lastName')) && $intern->resumePath && file_exists(public_path($intern->resumePath))) {
                $oldFullPath = public_path($intern->resumePath);

                // Ensure target directory exists
                if (!file_exists($publicDirPath)) {
                    mkdir($publicDirPath, 0755, true);
                }

                $newFullPath = public_path($newRelPath);
                rename($oldFullPath, $newFullPath);

                $data['resumePath'] = $newRelPath;
            }

            // 5) Finally update the rest
            $intern->update($data);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Intern updated successfully.',
                    'data' => $intern,
                ],
                200,
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Intern not found.'], 404);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to update intern.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function show($id)
    {
        try {
            $intern = Intern::findOrFail($id);
            return response()->json(['success' => true, 'data' => $intern]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Intern not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch intern.', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $intern = Intern::findOrFail($id);

            // Construct the full path to the resume file
            $resumePath = public_path($intern->resumePath);

            // Check if the file exists and delete it
            if (File::exists($resumePath)) {
                File::delete($resumePath);
            }

            // Delete the intern record from the database
            $intern->delete();

            return response()->json([
                'success' => true,
                'message' => 'Intern and associated resume deleted successfully.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Intern not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to delete intern.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $intern = Intern::findOrFail($id);

            $request->validate([
                'status' => 'required|string|in:pending,accepted,rejected,payment-pending,payment-done-waiting-for-approval',
            ]);

            $intern->status = $request->status;
            $intern->save();

            return response()->json([
                'success' => true,
                'message' => 'Intern status updated successfully.',
                'data' => $intern,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Intern not found.'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.', 'error' => $e->getMessage()], 500);
        }
    }
}
