<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 30);
            $table->string('sobrenome', 30);
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->date('data_nascimento');
            $table->string('tipo_documento');
            $table->integer('num_documento');
            $table->string('endereco', 60);
            $table->string('telefone');
            $table->string('email') ->unique();
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
        Schema::dropIfExists('clientes');
    }
}
