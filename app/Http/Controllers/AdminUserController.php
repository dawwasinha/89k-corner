<?php

namespace App\Http\Controllers;

use App\Mail\PaymentReminderMail;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('room')->get();
        $rooms = Room::all();
        return view('user_admin.user.index', compact('users', 'rooms'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'room_id' => 'nullable|exists:rooms,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed! Please check your input.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'room_id' => $request->room_id,
        ]);

        return redirect()->back()->with('success', 'User successfully created!');
    }



    public function show($id)
    {
        $user = User::with('room')->findOrFail($id);
        $rooms = Room::where('status', 'available')->get();

        // return $user;

        return view('user_admin.user.show', compact('user', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'room_id' => 'required|exists:rooms,id',
        ]);

        $user = User::findOrFail($id);

        if ($request->has('room_id')) {
            $room = Room::find($request->room_id);

            if (!$room) {
                return redirect()->back()->with('error', 'Room not found!');
            }

            // Ubah status kamar lama (jika ada) menjadi available
            if ($user->room_id) {
                Room::where('id', $user->room_id)->update([
                    'status' => 'available',
                ]);
            }

            // Ubah status kamar baru menjadi unavailable
            Room::where('id', $request->room_id)->update([
                'status' => 'unavailable',
            ]);

            // Buat catatan pembayaran baru
            $payment = Payment::create([
                'user_id'     => $user->id,
                'room_id'     => $request->room_id,
                'due_date'    => now()->addMonth(),
                'amount'      => $room->price ?? 0,
                'status'      => 'pending',
                'invoice_code'=> 'INV' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
            ]);

            // Kirim email pengingat pembayaran
            Mail::to($user->email)->send(new PaymentReminderMail($payment));

            // Perbarui data user dengan room baru
            $user->room_id = $request->room_id;
        }


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'room_id' => $request->room_id,
        ]);

        return redirect()->route('user_admin.user.index', $id)->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user_admin.user.index')->with('success', 'User deleted successfully!');
    }
}
