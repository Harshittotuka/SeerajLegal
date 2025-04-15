<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Contact2Controller extends Controller
{
    public function update(Request $request)
    {
        try {
            // Path to the JSON file
            $jsonFilePath = public_path('personal_details.json');

            // Check if file exists
            if (!File::exists($jsonFilePath)) {
                return response()->json(['success' => false, 'message' => 'JSON file not found.'], 404);
            }

            // Read and decode the JSON file
            $jsonData = json_decode(File::get($jsonFilePath), true);

            // Validate incoming request
            $validatedData = $request->validate([
                'email' => 'nullable|email',
                'address' => 'nullable|string',
                'phone_no' => 'nullable|string',
                'phone_2' => 'nullable|string|nullable',
                'yrs_of_experience' => 'nullable|integer',
                'insta_link' => 'nullable',
                'facebook_link' => 'nullable',
                'youtube_link' => 'nullable',
                'twitter_link' => 'nullable',
                'whatsapp' => 'nullable|string',
                'linkedin' => 'nullable',
                'website_link' => 'nullable',
                'Quote' => 'nullable|string',
                'top_bar_points' => 'array',
            ]);

            // Update the personal details with new values
            foreach ($validatedData as $key => $value) {
                // if ($value !== null) {
                    $jsonData['personal_details'][$key] = $value;
                // }
            }

            // Save updated data back to JSON file
            File::put($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return response()->json(['success' => true, 'message' => 'Personal details updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update personal details.', 'error' => $e->getMessage()], 500);
        }
    }
}
