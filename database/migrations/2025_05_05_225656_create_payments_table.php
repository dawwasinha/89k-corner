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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code')->unique(); // Kode invoice
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->date('due_date'); // Tanggal jatuh tempo
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->string('proof_image')->nullable(); // Bukti transfer
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending'); // Status pembayaran
            $table->timestamps();
    

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
