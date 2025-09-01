<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date'); // fecha
            $table->string('reason'); // motivo
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); // paciente_id
            $table->foreignId('medic_id')->constrained('medics')->onDelete('cascade'); // medico_id
            $table->string('status'); // estado
            $table->text('notes')->nullable(); // observaciones
            $table->string('room')->nullable(); // sala
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
