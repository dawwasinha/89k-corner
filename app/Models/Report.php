<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',           // Memastikan user_id bisa di-assign secara massal
        'room_id',           // Menambahkan room_id yang akan digunakan untuk laporan
        'title',
        'description',
        'status',
        'image',             // Menambahkan image supaya bisa di-assign
    ];

    /**
     * Relasi ke User (Penulis laporan)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke ReportReply (Balasan laporan)
     */
    public function replies()
    {
        return $this->hasMany(ReportReply::class)->whereNull('parent_id');
    }

    /**
     * Relasi polymorphic (jika laporan terkait dengan objek lain seperti Room atau lainnya)
     */
    public function reportable()
    {
        return $this->morphTo();
    }

    /**
     * Relasi ke Room (Tempat laporan ini dibuat)
     */
    public function room()
    {
        return $this->belongsTo(Room::class); // Pastikan ada relasi ke Room, jika laporan terkait dengan room
    }
}