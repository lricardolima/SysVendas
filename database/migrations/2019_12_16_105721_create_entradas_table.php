<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('entrada_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('fornecedores_id');
            $table->date('data');
            $table->string('tipo_comprovante');
            $table->string('serie');
            $table->string('correlativo');
            $table->decimal('imposto', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
