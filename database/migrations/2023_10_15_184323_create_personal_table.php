<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ap_pa');
            $table->string('ap_ma');
            $table->integer('dni');
            $table->string('correo');
            $table->datetime('f_nac');
            $table->unsignedBigInteger('tipo_personal_id');
            $table->foreign('tipo_personal_id')->references('id')->on('tipo_personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
};
