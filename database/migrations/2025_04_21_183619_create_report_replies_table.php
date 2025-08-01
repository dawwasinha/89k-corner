<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained()->onDelete('cascade'); // Relasi dengan laporan
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan user
            $table->foreignId('parent_id')->nullable()->constrained('report_replies')->onDelete('cascade'); // Relasi balasan ke balasan lainnya (jika ada)
            $table->text('body'); // Isi balasan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_replies');
    }
};