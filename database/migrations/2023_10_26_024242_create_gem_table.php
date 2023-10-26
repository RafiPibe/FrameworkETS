<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('gems', function (Blueprint $table) {
            $table->id();
            $table->string('gemName');
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->integer('gemSize');
            $table->string('Mines_id')->constrained()->nullable();
            $table->longText('gemImage');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gems');
    }
};
