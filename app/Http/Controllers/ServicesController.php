<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\WayRequest;
use App\Http\Resources\SuccessResponse;
use App\Models\Booking;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;
use App\Models\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    function add(ServicesRequest $request)
    {
        $file = $request->file('image');
        $fileName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $fileName, 'public');
        $image = Image::create([
            'path' => $path,
        ]);
        $image->save();

        Service::create(['image_id' => $image->id, ...$request->validated()]);
        return redirect()->back();
    }

    public function patch(Service $service, ServicesRequest $request)
    {
        $file = $request->file('image');
        $fileName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $fileName, 'public');
        $image = Image::create([
            'path' => $path,
        ]);
        $image->save();

        $service->update(['image_id' => $image->id, ...$request->validated()]);
        $service->save();
        return redirect()->back();
    }

    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }
}

