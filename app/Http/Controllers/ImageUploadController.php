<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $path = $request->file('file')->store('uploads', 'public');

            return response()->json(['url' => Storage::url($path)]);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
