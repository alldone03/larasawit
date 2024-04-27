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
        Schema::create('tb_devicelinktousers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tb_devices')->constrained('tb_devices');
            $table->foreignId('users')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_devicelinktousers');
    }
};