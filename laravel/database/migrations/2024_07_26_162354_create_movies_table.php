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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            // Để cho phép cột nhận giá trị null, sử dụng phương thức 'nullable()'
            $table->string('poster', 255)->nullable();
            $table->string('intro', 255);
            $table->dateTime('release_date');
            // Đặt khóa phụ cho cột với phương thức 'constrained()'
            $table->foreignId('genre_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
