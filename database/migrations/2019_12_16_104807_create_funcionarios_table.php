<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('funcionario_id');
            $table->string('nome', 30);
            $table->string('sobrenome', 30);
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->date('data_nascimento');
            $table->integer('num_documento');
            $table->longText('endereco', 50);
            $table->integer('tetlefone');
            $table->string('email') ->unique();
            $table->string('acesso');
            $table->string('usuario', 30);
            $table->string('senha', 30);
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
        Schema::dropIfExists('funcionarios');
    }
}
