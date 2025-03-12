<?php

use Illuminate\Support\Facades\Route;
use App\Models\Way;
use App\Models\Service;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;

Route::get('/', function () {
    $ways = Way::with('image')
        ->orderBy('views', 'desc')
        ->take(4)
        ->get();
    $services = Service::orderBy('views', 'desc')
        ->take(4)
        ->get();
    return view('index', compact('ways', 'services'));
})->name('index');

Route::get('/flights', function (Request $request) {
    $query = Way::query();
    if (!empty(trim($request->price))) {
        $query->where('price', '<=', $request->price);
    }
    if (!empty(trim($request->departure_time))) {
        $query->whereDate('departure_time', '=', $request->departure_time);
    }
    if (!empty(trim($request->class))) {
        $query->where('class', '=', $request->class);
    }
    $ways = $query
        ->orderBy('views', 'desc')
        ->paginate(8)
        ->appends($request->except('page'));
    return view('ways', compact('ways'));
})->name('ways');

Route::get('/flights/{way}', function (Way $way) {
    $way->views++;
    $way->save();
    $way->comments();
    return view('way', compact('way'));
})->name('way');

Route::get('/service', function (Request $request) {
    $query = Service::query();
    if (!empty(trim($request->type))) {
        $query->where('type', '=', $request->type);
    }
    $services = $query
        ->with('images')
        ->orderBy('views', 'desc')
        ->paginate(8)
        ->appends($request->except('page'));
    return view('services', compact('services'));
})->name('services');

Route::get('/service/{service}', function (Service $service) {
    $service->views++;
    $service->save();
    $service->images();
    return view('service', compact('service'));
})->name('service');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/image/{image}', [ImageController::class, 'get'])->name('image');

Route::post('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/login', [UserController::class, 'login'])->name('auth.login');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::prefix('/booking')->group(function () {
        Route::post('/', [BookingController::class, 'add'])->name('booking.add');
        Route::patch('/{booking}', [BookingController::class, 'patch'])->name('booking.patch');
        Route::delete('/{booking}', [BookingController::class, 'delete'])->name('booking.delete');
    });

    Route::get('/profile', function () {
        $bookings = auth()->user()->bookings()->with('way')->get();
        return view('profile', compact('bookings'));
    })->name('profile');

    Route::middleware('role:admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/bookings', function () {
                $ways = Way::withCount('bookings')
                    ->withAvg('bookings', 'total_price')
                    ->orderByDesc('bookings_count')
                    ->get();

                $activeBookingsCount = $ways->flatMap->bookings->where('status', 'status')->count();
                $averagePrice = $ways->flatMap->bookings->avg('total_price');
                $maxBookingsCount = $ways->max('bookings_count');

                return view('admin.bookings', compact(
                    'ways',
                    'activeBookingsCount',
                    'averagePrice',
                    'maxBookingsCount',
                ));
            })->name('admin.bookings');
        });
    });
});
