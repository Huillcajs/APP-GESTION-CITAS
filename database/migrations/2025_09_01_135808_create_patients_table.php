<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');        // nombre
            $table->string('last_name');         // apellido
            $table->date('birth_date');          // fecha_nacimiento
            $table->string('gender');            // genero
            $table->string('phone');             // telefono
            $table->string('address');           // direccion
            $table->string('blood_type');        // tipo_sangre
            $table->timestamps();
            $table->softDeletes();               // for soft delete if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
