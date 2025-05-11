<?php

namespace App\Http\Controllers;

use App\Mail\PaymentRejectedMail;
use App\Mail\PaymentReminderMail;
use App\Mail\PaymentSuccedMail;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminPaymentController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter sorting dari request
        $sortBy = $request->get('sort_by', 'created_at'); // Default: created_at
        $sortOrder = $request->get('sort_order', 'desc'); // Default: desc

        // Validasi kolom yang diizinkan untuk sorting
        $allowedSorts = ['name', 'room', 'due_date', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        // Ambil data pembayaran dengan sorting
        $payments = Payment::with(['user', 'room'])
            ->orderBy($sortBy, $sortOrder)
            ->get();

        $users = User::all();
        $rooms = Room::all();

        return view('user_admin.payments.index', compact('payments', 'users', 'rooms', 'sortBy', 'sortOrder'));
    }

    public function show($id)
    {
        $payment = Payment::with(['user', 'room'])->findOrFail($id);

        return view('user_admin.payments.show', compact('payment'));
    }

    public function create()
    {
        return view('user_admin.payments.create');
    }

    public function edit($id)
    {
        return view('user_admin.payments.edit', compact('id'));
    }

    public function approve(Payment $payment)
    {
        // Update status pembayaran menjadi 'verified'
        $payment->update(['status' => 'verified']);

        // Buat entri pembayaran baru dengan due_date 1 bulan dari due_date sebelumnya
        $payment = Payment::create([
            'user_id' => $payment->user_id,
            'room_id' => $payment->room_id,
            'due_date' => $payment->due_date->addMonth(), // Tambahkan 1 bulan dari due_date sebelumnya
            'amount' => $payment->amount,
            'status' => 'pending', // Status baru
            'invoice_code'=> 'INV' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
        ]);

        Mail::to($payment->user->email)->send(new PaymentSuccedMail($payment));

        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    public function reject(Request $request, Payment $payment)
    {
        // Update status pembayaran menjadi 'rejected'
        $payment->update(['status' => 'rejected']);
        $payment->feedback = $request->input('feedback');

        Mail::to($payment->user->email)->send(new PaymentRejectedMail($payment));

        // Buat entri pembayaran baru dengan due_date yang sama
        $paymentNew = Payment::create([
            'user_id' => $payment->user_id,
            'room_id' => $payment->room_id,
            'due_date' => $payment->due_date, // Tetap gunakan due_date yang sama
            'amount' => $payment->amount,
            'status' => 'pending', // Status baru
            'invoice_code'=> 'INV' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
        ]);

        Mail::to($payment->user->email)->send(new PaymentReminderMail($paymentNew));

        return redirect()->route('user_admin.payments.show', $payment->id)
            ->with('success', 'Payment rejected and a new payment has been created.');
    }
}
