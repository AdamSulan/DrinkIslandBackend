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
        Schema::create('tipus', function (Blueprint $table) {
            $table->id();
            $table->foreignId( "italok_id" );
            $table->boolean('teli');
            $table->boolean('nyari');
            $table->boolean('edes');
            $table->boolean('savanyu');
            $table->boolean('keseru');
            $table->boolean('alkoholos');
            $table->boolean('alkoholmentes');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipus');
    }
};
