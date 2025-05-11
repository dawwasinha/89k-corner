<?php

namespace App\Http\Controllers;

use App\Mail\PaymentReminderMail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Auth::user()->payments; // Ambil pembayaran user yang login

        return view('renter.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'amount' => 'required|numeric',
            'proof_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $proofImagePath = $request->file('proof_image')->store('public/transfer_proofs');

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'due_date' => now()->addMonth(),
            'amount' => $request->amount,
            'proof_image' => $proofImagePath,
            'status' => 'pending',
            'invoice_code' => 'INV' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
        ]);

        Mail::to(Auth::user()->email)->send(new PaymentReminderMail($payment));

        return redirect()->route('payments.index')->with('success', 'Payment submitted successfully.');
    }

    public function show(Payment $payment)
    {
        return view('renter.payments.show', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        try {
            // Validasi input
            $request->validate([
                'proof_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            ], [
                'proof_image.required' => 'Proof of payment is required.',
                'proof_image.image' => 'The file must be an image.',
                'proof_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'proof_image.max' => 'The image size must not exceed 2MB.',
            ]);

            // Proses upload file
            if ($request->hasFile('proof_image')) {
                $file = $request->file('proof_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('transfer_proofs', $fileName, 'public'); // Simpan file ke storage

                // Update payment record
                $payment->update([
                    'proof_image' => $filePath,
                ]);

                return redirect()->route('payments.show', $payment->id)
                    ->with('success', 'Proof of payment uploaded successfully.');
            }

            return redirect()->back()->with('error', 'No file was uploaded.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Failed to upload proof of payment: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to upload proof of payment.');
        }
    }
}
