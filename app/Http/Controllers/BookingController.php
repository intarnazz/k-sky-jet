<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResponse;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    function add(BookingRequest $request)
    {
        Booking::create(['user_id' => Auth::id(), ...$request->validated()]);
        return redirect()->back();
    }

    public function patch(Booking $booking, Request $request)
    {
        $booking->update($request->all());
        return redirect()->back();
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        return redirect()->back();
    }
}

