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
        Schema::create('why_choose_us_data', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->text('description');
            $table->foreignId('why_choose_us_id')->constrained('why_choose_us')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_data');
    }
};
