<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportReply;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return view('user_admin.report.index', compact('reports'));
    }

    public function create()
    {
        $rooms = Room::all(); // Mengambil semua data room
        return view('user_admin.report.create', compact('rooms'));
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
            $imagePath = $request->file('image')->store('public/reports');
        }

        // Menyimpan data report ke database
        $report = Report::create([
            'user_id' => auth()->user()->id,  // Menyimpan ID user yang sedang login
            'room_id' => $request->room_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath, // Menyimpan path gambar
        ]);

        // Redirect ke halaman index dan menampilkan pesan sukses
        return redirect()->route('reports.index')->with('success', 'Report created successfully!');
    }

    public function show(Report $report)
    {
        // Memuat relasi dengan user dan replies
        $report->load(['user', 'replies.replies.user', 'replies.user']);

        // Menampilkan halaman report detail
        return view('user_admin.report.show', compact('report'));
    }

    public function repliesStore(Request $request, Report $report)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:report_replies,id',
        ]);

        $reportReply = ReportReply::create([
            'report_id' => $report->id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'body' => $request->body,
        ]);

        Mail::to($report->user->email)->send(new \App\Mail\ReportReplyMail($reportReply));

        return redirect()->route('user_admin.reports.show', $report->id)->with('success', 'Reply posted!');
    }

    public function approve(Request $request, Report $report)
    {
        $report->update(['status' => 'open']);

        return redirect()->back()->with('success', 'Report approved successfully!');
    }

    public function reject(Request $request, Report $report)
    {
        $report->update(['status' => 'rejected']);
        $report->feedback = $request->feedback;

        Mail::to($report->user->email)->send(new \App\Mail\ReportRejectedMail($report));

        return redirect()->back()->with('success', 'Report rejected successfully!');
    }
}
