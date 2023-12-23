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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string("nagari_kunjungan",100)->nullable();
            $table->text("kegiatan")->nullable();
            $table->text("hasil")->nullable();
            $table->text("langkah")->nullable();
            $table->text("rekomendasi")->nullable();
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->timestamps();

            $table->foreign("user_id")->on("users")->references("id");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
