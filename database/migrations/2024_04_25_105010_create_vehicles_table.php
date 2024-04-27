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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()
                ->constrained('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('plate_number')->nullable();
            $table->enum('type', ['car', 'motorcycle'])->nullable();
            $table->string('model')->nullable();
            $table->string('make')->nullable();
            $table->string('colour')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
