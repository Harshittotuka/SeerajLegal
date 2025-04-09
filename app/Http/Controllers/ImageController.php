<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\TopImageService;


class ImageController extends Controller
{
    protected $service;

    public function __construct(TopImageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllImages());
    }

    // Get image by image_id
    public function show($imageId)
    {
        $image = $this->service->getImageById($imageId);
        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }
        return response()->json($image);
    }

    // Update image by image_id
    public function update(Request $request, $imageId)
    {
        $updated = $this->service->updateImageById($imageId, $request->all());
        if ($updated) {
            return response()->json(['message' => 'Image updated successfully']);
        }
        return response()->json(['message' => 'Update failed'], 400);
    }

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
