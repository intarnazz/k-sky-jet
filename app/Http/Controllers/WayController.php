<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\WayRequest;
use App\Http\Resources\SuccessResponse;
use App\Models\Booking;
use App\Models\Image;
use App\Models\User;
use App\Models\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class WayController extends Controller
{
    function add(WayRequest $request)
    {
        $file = $request->file('image');
        $fileName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $fileName, 'public');
        $image = Image::create([
            'path' => $path,
        ]);
        $image->save();

        Way::create(['image_id' => $image->id, ...$request->validated()]);
        return redirect()->back();
    }

    public function patch(Way $way, WayRequest $request)
    {
        $file = $request->file('image');
        $fileName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $fileName, 'public');
        $image = Image::create([
            'path' => $path,
        ]);
        $image->save();

        $way->update(['image_id' => $image->id, ...$request->validated()]);
        return redirect()->back();
    }

    public function delete(Way $way)
    {
        $way->delete();
        return redirect()->back();
    }
}

