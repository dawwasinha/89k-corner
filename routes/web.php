<?php

use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportReplyController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Mail\PaymentReminderMail;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/about', function () {
	return view('about');
});

Route::get('/contact', function () {
	return view('contact');
});

Route::get('/room', function () {
	$rooms = Room::where('status', 'available')->get();
	return view('room', compact('rooms'));

	return view('room');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/room', App\Http\Controllers\RoomController::class)->middleware('auth');
Route::resource('/admin/user', App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/pengaduan', function () {
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

	Route::prefix('admin/report-management')->group(function () {
		Route::get('/', [AdminReportController::class, 'index'])->name('user_admin.report.index');
		Route::post('/', [AdminReportController::class, 'store'])->name('user_admin.report.store');
		Route::put('/{report}', [AdminReportController::class, 'update'])->name('user_admin.report.update');
		Route::delete('/{id}', [AdminReportController::class, 'destroy'])->name('user_admin.report.destroy');
		Route::get('/{report}', [AdminReportController::class, 'show'])->name('user_admin.reports.show');
		Route::patch('/admin/reports/{report}/approve', [AdminReportController::class, 'approve'])->name('user_admin.reports.approve');
		Route::patch('/admin/reports/{report}/reject', [AdminReportController::class, 'reject'])->name('user_admin.reports.reject');

		// Kirim balasan ke laporan
		Route::post('/{report}/replies', [AdminReportController::class, 'repliesStore'])->name('user_admin.reports.replies.store');
	});

	Route::prefix('admin/payment-management')->group(function () {
		Route::get('/', [AdminPaymentController::class, 'index'])->name('user_admin.payments.index');
		Route::post('/', [AdminPaymentController::class, 'store'])->name('user_admin.payments.store');
		Route::put('/{payment}', [AdminPaymentController::class, 'update'])->name('user_admin.payments.update');
		Route::delete('/{id}', [AdminPaymentController::class, 'destroy'])->name('user_admin.payments.destroy');
		Route::get('/{payment}', [AdminPaymentController::class, 'show'])->name('user_admin.payments.show');
		Route::put('/admin/payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('user_admin.payments.approve');
		Route::put('/admin/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('user_admin.payments.reject');
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

	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return redirect('/dashboard');
	})->name('sign-up');
});

// Routes untuk renter
Route::group(['middleware' => ['auth', 'renter']], function () {
	Route::get('/renter-dashboard', function () {
		// Mengambil data user yang sedang login
		$user = Auth::user();
		// Mengambil data kamar yang dimiliki oleh user
		$rooms = $user->rooms; // Asumsi ada relasi 'rooms' di model User
		// Mengambil data laporan yang dibuat oleh user
		$reports = $user->reports; // Asumsi ada relasi 'reports' di model User
		// Mengambil data balasan laporan yang dibuat oleh user
		$reportReplies = $user->reportReplies; // Asumsi ada relasi 'reportReplies' di model User
		// Mengambil data tagihan yang dimiliki oleh user
		$billing = $user->billing; // Asumsi ada relasi 'billing' di model User
		// Mengambil data transaksi yang dimiliki oleh user
		$transactions = $user->transactions; // Asumsi ada relasi 'transactions' di model User
		// Mengambil data pembayaran yang dimiliki oleh user
		$payments = $user->payments; // Asumsi ada relasi 'payments' di model User

		// return $user;

		return view('renter.index', compact('user'));
	})->name('renter.dashboard');

	Route::get('/report-management', [ReportController::class, 'index'])->name('reports.index');

	// Form & aksi buat laporan baru
	Route::get('/report-management/create', [ReportController::class, 'create'])->name('reports.create'); // Optional jika pakai Blade form
	Route::post('/report-management', [ReportController::class, 'store'])->name('reports.store');

	// Detail laporan + reply
	Route::get('/report-management/{report}', [ReportController::class, 'show'])->name('reports.show');

	// Kirim balasan ke laporan
	Route::post('/report-management/{report}/replies', [ReportReplyController::class, 'store'])->name('reports.replies.store');
	Route::patch('/reports/{report}/update-status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');


	Route::get('/payments-management', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments-management/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments-management', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments-management/{payment}', [PaymentController::class, 'show'])->name('payments.show');
	Route::put('/payments-management/{payment}', [PaymentController::class, 'update'])->name('payments.update');

	Route::get('/login', function () {
		return redirect('/renter-dashboard');
	})->name('sign-up');
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

Route::group(['middleware' => ['auth']], function () {
	Route::get('/profile', [InfoUserController::class, 'create']);
	Route::get('/user-profile', [InfoUserController::class, 'userCreate']);
	Route::post('/profile', [InfoUserController::class, 'store'])->name('profile.store');

	Route::get('/logout', [SessionsController::class, 'destroy']);
});


Route::post('/send-payment-reminder', function (Illuminate\Http\Request $request) {
    $user = \App\Models\User::find($request->user_id);
    $dueDate = $request->due_date; 

    if ($user) {
        Mail::to($user->email)->send(new PaymentReminderMail($user, $dueDate));
        return response()->json(['message' => 'Email berhasil dikirim!']);
    }

    return response()->json(['message' => 'User tidak ditemukan!'], 404);
});

Route::get('/email-test', function () {
	$user = \App\Models\User::find(1);
	$dueDate = now()->addDays(7); 

	$payment = \App\Models\Payment::latest()->first();
	

	return view('emails.payment_reminder', compact('user', 'dueDate', 'payment'));
});

Route::get('/report-test', function () {
	$report = \App\Models\Report::latest()->first();

	return view('emails.report_created', compact('report'));
});

Route::get('/report-rejected', function () {
	$report = \App\Models\Report::latest()->first();
	$report->feedback = "Laporan ditolak karena tidak sesuai dengan ketentuan yang berlaku.";

	return view('emails.report_rejected', compact('report'));
});

Route::get('/report-reply', function () {
	$reportReply = \App\Models\ReportReply::latest()->first();

	// return $reportReply;
	return view('emails.report_reply', compact('reportReply'));
});

Route::get('/payment-succeded', function () {
	$payment = \App\Models\Payment::latest()->first();
	$payment->feedback = "Pembayaran ditolak karena tidak sesuai dengan ketentuan yang berlaku.";

	// return $payment;
	return view('emails.payment_succeded', compact('payment'));
});

Route::get('/payment-rejected', function () {
	$payment = \App\Models\Payment::latest()->first();
	$payment->feedback = "Pembayaran ditolak karena tidak sesuai dengan ketentuan yang berlaku.";

	return view('emails.payment_rejected', compact('payment'));
});


Route::get('/login', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('/dashboard');
        } elseif (Auth::user()->role == 'renter') {
            return redirect('/renter-dashboard');
        }
    }

    return view('session.login-session');
})->name('login');
