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
    Schema::create('prescriptions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('record_id')->constrained('medical_records')->onDelete('cascade');
        $table->foreignId('drug_id')->constrained('drugs')->onDelete('cascade');
        $table->integer('quantity');
        $table->string('dosage');
        $table->text('instruction')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('prescriptions');
}

};
