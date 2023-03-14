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
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->foreignId('role_id')->nullable()->constrained();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            // $table->string('address')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('job')->nullable();
            // $table->string('img')->nullable();
            // $table->rememberToken();
            // $table->string('salary')->nullable();
            
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
