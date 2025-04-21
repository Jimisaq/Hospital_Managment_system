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
             Schema::table('users', function (Blueprint $table) {
                 $table->string('shift_schedule')->nullable()->after('address'); // Add shift_schedule field
                 $table->boolean('status')->default(false)->after('role'); // Add status field
             });
         }

         /**
          * Reverse the migrations.
          */
         public function down(): void
         {
             Schema::table('users', function (Blueprint $table) {
                 $table->dropColumn(['shift_schedule', 'status']); // Drop both fields
             });
         }
     };
