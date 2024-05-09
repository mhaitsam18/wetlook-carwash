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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->nullable()
                ->constrained('packages')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreignId('vehicle_id')->nullable()
                ->constrained('vehicles')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreignId('member_id')->nullable()
                ->constrained('members')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->date('date');
            $table->time('time');
            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed'
            ])->default('pending')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
