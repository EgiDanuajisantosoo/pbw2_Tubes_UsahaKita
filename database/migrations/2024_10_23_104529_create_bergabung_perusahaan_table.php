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
        Schema::create('bergabung_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->bigInteger('modal_usaha');
            $table->enum('status_permintaan',['pendding','diterima','ditolak'])->default('pendding')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bergabung_perusahaan');
    }
};
