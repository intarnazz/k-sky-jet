<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;


class ImageController extends Controller
{
    function get(Image $image)
    {
        return Storage::disk('public')->download($image->path);
    }

    function add(Request $request)
    {
        $file = $request->file('file');
        $fileName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public', $fileName);
        $image = Image::create([
            'path' => $path,
        ]);
        $image->save();
        $user = auth()->user();
        $user->image_id = $image->id;
        $user->save();
        return new SuccessResponse($image);
    }
}
