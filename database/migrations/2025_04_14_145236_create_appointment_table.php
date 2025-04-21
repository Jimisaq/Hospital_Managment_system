<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
        $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');
        $table->date('date');
        $table->time('time');
        $table->text('note')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('appointments');
}

};
