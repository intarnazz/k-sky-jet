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
        Schema::create('ways', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: \App\Models\Image::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('route');
            $table->integer('views');
            $table->string('description');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->integer('price');
            $table->string('class');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ways');
    }
};
