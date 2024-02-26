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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('identification',15);
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('gender',15)->nullable();
            $table->string('address',100)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',50)->unique();
            $table->string('picture')->nullable();
            $table->enum('status',['activo','inactivo'])->default('activo');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
