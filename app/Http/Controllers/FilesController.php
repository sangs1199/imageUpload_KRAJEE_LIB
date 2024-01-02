<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedFiles = $request->file('input-res-1');

        // Validate and store the uploaded files
        $filePaths = [];
        foreach ($uploadedFiles as $file) {
            $filePath = $file->store('public/uploads');
            $filePaths[] = asset('storage/' . $filePath);
        }

        // Respond with success or error message
        return response()->json(['message' => 'Files uploaded successfully', 'filePaths' => $filePaths,'append'=>true]);
    }

    public function getFiles()
    {
        $imageUrls = Storage::files('public/uploads');

        // Convert storage URLs to public URLs
        $publicUrls = array_map(function ($url) {
            return asset(Storage::url($url));
        }, $imageUrls);

        return response()->json(['images' => $publicUrls]);
    }
}
