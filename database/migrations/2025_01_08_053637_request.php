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
        Schema::create('Request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bisnisman_id')->default(0);
            $table->unsignedBigInteger('partner_id')->default(0);
            $table->unsignedBigInteger('lowongan_id');
            $table->enum('Persetujuan_Bisnisman',['Setuju','Tidak Setuju','-'])->default('-');
            $table->enum('Persetujuan_Partner',['Setuju','Tidak Setuju','-'])->default('-');
            $table->foreign('bisnisman_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
