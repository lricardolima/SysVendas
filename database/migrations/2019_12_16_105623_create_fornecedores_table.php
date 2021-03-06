<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresas');
            $table->string('setor_comercial');
            $table->string('tipo_documento');
            $table->integer('num_documento');
            $table->longText('endereco', 100);
            $table->integer('telefone');
            $table->string('email') ->unique();
            $table->string('url') ->unique();
            $table->timestamps();

            $table->foreign('empresas')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
