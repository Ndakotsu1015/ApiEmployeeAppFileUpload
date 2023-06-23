<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('date_of_birth');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('local_government_id')->constrained();
            $table->foreignId('marital_status_id')->constrained();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};