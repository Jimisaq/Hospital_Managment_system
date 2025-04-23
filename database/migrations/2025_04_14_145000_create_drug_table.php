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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('drug_name');
            $table->string('category')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->integer('quantity_in_stock');
            $table->date('expiry_date');
            $table->foreignId('added_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
    
};
