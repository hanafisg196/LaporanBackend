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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username",100)->nullable(false);
            $table->string("password",100)->nullable(false);
            $table->string("nama",100)->nullable(false);
            $table->string("email",100)->nullable(false);
            $table->string("posisi",100)->nullable(false);
            $table->string("jabatan",100)->nullable(false);
            $table->string("kecamatan",100)->nullable(false);
            $table->string("kabupaten_kota",100)->nullable(false);
            $table->string("provinsi",100)->nullable(false);
            $table->string("role")->default("user");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
