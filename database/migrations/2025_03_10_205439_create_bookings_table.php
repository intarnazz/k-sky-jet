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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: \App\Models\User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(model: \App\Models\Way::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('status')->default('status');
            $table->integer('total_price');
            $table->string('name')->nullable(); // Имя пассажира
            $table->string('phone')->nullable(); // Контактный телефон
            $table->text('special_requests')->nullable(); // Особые пожелания
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
