<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportReply;
use Illuminate\Http\Request;

class ReportReplyController extends Controller
{
    public function store(Request $request, Report $report)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:report_replies,id',
        ]);

        ReportReply::create([
            'report_id' => $report->id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Reply posted!');
    }

}