<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with(['user', 'replies.user'])->latest()->get();

        return view('renter.reports.index', compact('reports'));
    }

    public function create()
    {
        $user = auth()->user();
        $room = Room::find($user->room_id);

        return view('renter.reports.create', compact('room'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'room_id' => 'required|integer|exists:rooms,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi gambar
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Menyimpan gambar ke dalam storage/public/reports dan mendapatkan path-nya
            $imagePath = $request->file('image')->store('reports', 'public');
        }

        // Menyimpan data report ke database
        $report = Report::create([
            'user_id' => auth()->user()->id,  // Menyimpan ID user yang sedang login
            'room_id' => $request->room_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'on-review', // Status default saat report dibuat
            'image' => $imagePath, // Menyimpan path gambar
        ]);

        Mail::to('admin@89kcorner.com')->send(new \App\Mail\ReportCreatedMail($report));

        // Redirect ke halaman index dan menampilkan pesan sukses
        return redirect()->route('reports.index')->with('success', 'Report created successfully!');
    }

    public function show(Report $report)
    {
        // Memuat relasi dengan user dan replies
        $report->load(['user', 'replies.replies.user', 'replies.user']);

        // return $report->load(['user', 'replies.replies.user', 'replies.user']);

        // Menampilkan halaman report detail
        return view('renter.reports.show', compact('report'));
    }

    public function updateStatus(Report $report)
    {
        $report->status = $report->status === 'open' ? 'closed' : 'open';
        $report->save();

        return redirect()->back()->with('success', 'Report status updated successfully.');
    }
}