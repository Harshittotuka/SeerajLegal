<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use Illuminate\Support\Facades\File;

class RuleController extends Controller
{
    // Get list of rule names
    public function index()
    {
        return Rule::select('id', 'name')->get();
    }

    // Get specific rule
    public function show($id)
    {
        return Rule::findOrFail($id);
    }

    public function store(Request $request)
    {
        // Capitalize the first letter of each word in the name
        $request->merge(['name' => ucwords(strtolower($request->name))]);

        // Validate if the name is unique
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:rules,name',
            'rules' => 'required|string',
        ]);

        // Check if there is a validation error
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $validator->errors()->first(),
                ],
                400,
            ); // Send the error message with HTTP 400 status
        }

        // Create and save the new rule
        $rule = Rule::create([
            'name' => $request->name,
            'rules' => $request->rules,
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Rule created successfully',
                'rule' => $rule,
            ],
            201,
        );
    }

    public function update(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);

        // Capitalize the first letter of each word in the name
        $request->merge(['name' => ucwords(strtolower($request->name))]);

        $name = $request->input('name');
        $newPath = $request->input('rules'); // optional new file path

        // Check for duplicate name
        if (Rule::where('name', $name)->where('id', '!=', $id)->exists()) {
            return response()->json(
                [
                    'success' => false,
                    'error' => 'The rule name is already taken.',
                ],
                400,
            ); // Return JSON error message with 400 status
        }

        // If the name has changed, rename the file in the local public directory
        if ($name !== $rule->name) {
            $oldPath = public_path($rule->rules);

            // If file exists, rename it
            if (File::exists($oldPath)) {
                // Generate new file name with the new name
                $filename = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $name) . '.pdf';
                $newFilePath = 'assets/dynamic/services/rules/' . $filename;

                // Rename the file
                File::move($oldPath, public_path($newFilePath));

                // Update the rules field with the new file path
                $rule->rules = $newFilePath;
            }
        }

        // Update the rule name
        $rule->name = $name;
        $rule->save();

        return response()->json([
            'success' => true,
            'message' => 'Rule updated successfully',
            'rule' => $rule,
        ]);
    }

    // Delete rule
    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);

        // Delete associated file
        if ($rule->rules) {
            $filePath = public_path($rule->rules);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $rule->delete();

        return response()->json(['message' => 'Rule deleted successfully']);
    }

    // Upload PDF
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'name' => 'required|string',
        ]);

        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No file received'], 400);
        }

        $file = $request->file('file');
        if (!$file->isValid()) {
            return response()->json(['error' => 'Uploaded file is invalid'], 400);
        }

        // Use the provided 'name' as the filename (ensure it's safe)
        $filename = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $request->name) . '.pdf';
        $directory = 'assets/dynamic/services/rules';
        $file->move(public_path($directory), $filename);

        $fullPath = $directory . '/' . $filename;

        return response()->json([
            'message' => 'File uploaded successfully',
            'path' => $fullPath,
        ]);
    }
}
