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
        Schema::create('rekaps', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sesi');
            $table->bigInteger('total_opening');
            $table->bigInteger('total_pos');
            $table->bigInteger('total_kasir');
            $table->bigInteger('opening_next_day');
            $table->bigInteger('selisih');
            $table->bigInteger('setoran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekaps');
    }
};
