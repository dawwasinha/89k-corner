<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'user_id',
        'parent_id',
        'body',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ReportReply::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ReportReply::class, 'parent_id');
    }
}

