<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FileUploadController extends Controller
{

    const LOG_KEY = 'FileUploadController';
    public function upload(Request $request)
    {
        log::alert($request);
        $validated = $this->validate($request, [
            'file' => 'required|mimes:pdf,png,jpg,jpeg|max:10000',
            'visibility' => ['nullable']
        ]);


        $file = $request->file('file');
        $visibility = $validated['visibility'] ?? 'public';
        $path = $visibility == 'private' ? 'files' : 'public/files';
        log::alert($path);
        $f_name = $file->store($path);

        log::alert($f_name);

        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "data" => $file->hashName()
        ]);
    }

    public function getFile($filename, $visibility = 'public')
    {
        $filepath = 'public/files/' . $filename;
        Log::alert($filepath);
        if (!Storage::disk('local')->exists($filepath)) {
            return response()->json('File not found.', 404);
        }
        return Storage::response($filepath);
    }
}
