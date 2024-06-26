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
        Schema::create('phase_criteres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id')->constrained()
            ->onDelete('no action')
            ->onUpdate('cascade');
            $table->foreignId('critere_id')->constrained()
            ->onDelete('no action')
            ->onUpdate('cascade');
            $table->integer('echelle')->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phase_criteres');
    }
};
