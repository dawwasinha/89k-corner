<?php

use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportReplyController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/room', function() {
	$rooms = Room::all(); // Mengambil semua data kamar
    return view('room', compact('rooms'));

    return view('room');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/room', App\Http\Controllers\RoomController::class)->middleware('auth');
Route::resource('/admin/user', App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/pengaduan', function() {
    return "ini pengaaduan";
});


Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('dashboard', function () {
		$totalUser = \App\Models\User::count();
		$totalRoom = \App\Models\Room::count();

		return view('dashboard', [
			'totalUser' => $totalUser,
			'totalRoom' => $totalRoom,
		]);
	})->name('dashboard');

	Route::get('/user-management', [App\Http\Controllers\AdminUserController::class, 'index'])->name('user_admin.user.index');
	Route::post('/user-management', [App\Http\Controllers\AdminUserController::class, 'store'])->name('user_admin.user.store');
	Route::get('/user-management/{id}', [App\Http\Controllers\AdminUserController::class, 'show'])->name('user_admin.user.show');
	Route::post('/user-management/{id}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('user_admin.user.update');
	Route::delete('/user-management/{id}', [App\Http\Controllers\AdminUserController::class, 'destroy'])->name('user_admin.user.destroy');

	Route::prefix('room-management')->group(function () {
		Route::get('/', [AdminRoomController::class, 'index'])->name('user_admin.rooms.index');
		Route::post('/', [AdminRoomController::class, 'store'])->name('user_admin.rooms.store');
		Route::put('/{room}', [AdminRoomController::class, 'update'])->name('user_admin.rooms.update');
		Route::delete('/{id}', [AdminRoomController::class, 'destroy'])->name('user_admin.rooms.destroy');
	});



	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	// Route::get('user-management', function () {
	// 	return view('laravel-examples/user-management');
	// })->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

// Routes untuk renter
Route::group(['middleware' => ['auth', 'renter']], function () {
    Route::get('/renter-dashboard', function () {
        return view('renter.dashboard');
    })->name('renter.dashboard');

	Route::get('/report-management', [ReportController::class, 'index'])->name('reports.index');

    // Form & aksi buat laporan baru
    Route::get('/report-management/create', [ReportController::class, 'create'])->name('reports.create'); // Optional jika pakai Blade form
    Route::post('/report-management', [ReportController::class, 'store'])->name('reports.store');

    // Detail laporan + reply
    Route::get('/report-management/{report}', [ReportController::class, 'show'])->name('reports.show');

    // Kirim balasan ke laporan
    Route::post('/report-management/{report}/replies', [ReportReplyController::class, 'store'])->name('reports.replies.store');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
