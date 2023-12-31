<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuentas', function (Blueprint $table) {
            
            $table->softDeletes();
            
            $table->string('user', 20)->primary();
            $table->string('password', 100);
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->integer('perfil_id',);
            $table->timestamps();
            $table->foreign('perfil_id')->references('id')->on('perfiles');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};

