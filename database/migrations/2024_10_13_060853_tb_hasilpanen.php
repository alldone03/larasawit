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
        Schema::create('tb_hasilpanens', function (Blueprint $table) {
            $table->id();
            $table->string('pohon');
            $table->integer('overripe');
            $table->integer('ripe');
            $table->integer('underripe');
            $table->string('gambar');
            $table->integer('brondolan');
            $table->string('keputusan');
            $table->foreignId('users')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hasilpanens');
    }
};
