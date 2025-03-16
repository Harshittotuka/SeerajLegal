<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        $fileName = $request->input('file');
        $filePath = "{$fileName}.json";

        if (!$fileName) {
            return response()->json(['success' => false, 'error' => 'File name is required'], 400);
        }

        if (!File::exists($filePath)) {
            return response()->json(['success' => false, 'error' => 'File not found'], 404);
        }

        $data = json_decode(File::get($filePath), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['success' => false, 'error' => 'Invalid JSON format'], 500);
        }

        $S_id = $request->input('S_id');
        if (!$S_id) {
            return response()->json(['success' => false, 'error' => 'S_id is required'], 400);
        }

        $updateData = $request->except(['S_id', 'file']);

        $found = false;
        foreach ($data as &$item) {
            if ($item['S_id'] == $S_id) {
                $item = array_merge($item, $updateData);
                $found = true;
                break;
            }
        }

        if (!$found) {
            return response()->json(['success' => false, 'error' => 'Item not found'], 404);
        }

        File::put($filePath, json_encode($data, JSON_PRETTY_PRINT));

        return response()->json(['success' => true, 'message' => 'Item updated successfully', 'data' => $item]);
    }
}
