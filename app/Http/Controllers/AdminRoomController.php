<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('user_admin.room.index', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'type_room' => 'required|string|max:255',
            'facility' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:available,unavailable',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img'), $imageName);
        }

        // dd($imageName);

        Room::create([
            'name' => $request->name,
            'price' => $request->price,
            'type_room' => $request->type_room,
            'facility' => $request->facility,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Room added successfully!');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'type_room' => 'required|string|max:255',
            'facility' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:available,unavailable',
        ]);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $room->image = $request->file('image')->store('photos', 'public');
        }

        $room->name = $request->name;
        $room->price = $request->price;
        $room->type_room = $request->type_room;
        $room->facility = $request->facility;
        $room->status = $request->status;
        $room->save();

        return redirect()->back()->with('success', 'Room updated successfully!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }
        $room->delete();

        return redirect()->route('user_admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}
