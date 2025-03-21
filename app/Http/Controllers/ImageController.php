<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
   
public function uploadCroppedImage(Request $request)
{   
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'path' => 'required|string',
    ]);

    $image = $request->file('image');
    $relativePath = $request->input('path'); // Relative path from the request
    $absolutePath = public_path($relativePath); // Absolute path in the public directory

    // Ensure the directory exists
    if (!file_exists(dirname($absolutePath))) {
        mkdir(dirname($absolutePath), 0755, true);
    }

    // Replace the existing image
    if (file_exists($absolutePath)) {
        unlink($absolutePath); // Delete the existing file
    }

    // Save the new image
    $image->move(dirname($absolutePath), basename($absolutePath));

    return response()->json([
        'success' => true,
        'message' => 'Image replaced successfully.',
    ]);
}
}
