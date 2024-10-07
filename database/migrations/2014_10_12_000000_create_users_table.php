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
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('bio')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['customer', 'moderator', 'admin'])->default('customer');
            $table->timestamp('email_verified_at')->nullable();
<<<<<<< HEAD
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('id_card')->nullable();
=======
            $table->string('phone')->nullable()->unique();
>>>>>>> main
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
