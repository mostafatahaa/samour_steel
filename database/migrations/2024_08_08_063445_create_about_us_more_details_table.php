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
        Schema::create('about_us_more_details', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->text('description');
            $table->string('image');
            $table->foreignId('about_us_id')->constrained('about_us')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_more_details');
    }
};
