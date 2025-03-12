<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResponse;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    function add(CommentRequest $request)
    {
        Comment::create(['user_id' => Auth::id(), ...$request->validated()]);
        return redirect()->back();
    }

    public function patch(Comment $comment, Request $request)
    {
        $comment->update($request->all());
        return redirect()->back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}

