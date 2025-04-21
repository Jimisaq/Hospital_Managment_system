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
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
        $table->decimal('total_amount', 10, 2);
        $table->decimal('amount_paid', 10, 2);
        $table->string('payment_method')->nullable();
        $table->string('payment_status')->default('pending');
        $table->foreignId('issued_by')->nullable()->constrained('users')->onDelete('set null');
        $table->date('issued_date');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('invoices');
}

};
