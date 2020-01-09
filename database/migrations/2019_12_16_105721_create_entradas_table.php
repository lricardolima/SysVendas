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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('funcionarios');
            $table->unsignedBigInteger('fornecedores');
            $table->date('data');
            $table->string('tipo_comprovante');
            $table->string('serie');
            $table->string('correlativo');
            $table->decimal('imposto', 4, 2);
            $table->timestamps();

            $table->foreign('funcionarios')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('fornecedores')->references('id')->on('fornecedores')->onDelete('cascade');
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
