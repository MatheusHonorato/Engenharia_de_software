<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_aluno');
            $table->date('nascimento')->default(date('d/m/y'));
            $table->string('cpf')->default('');
            $table->string('rg')->default('');
            $table->unsigned('sexo')->default('');
            $table->integer('periodo')->default('0');
            $table->string('telefone')->default('');
            $table->string('bairro')->default('');
            $table->string('rua')->default('');
            $table->string('nacionalidade')->default('');
            $table->integer('numero')->default('0');
            $table->string('cidade')->default('');
            $table->string('estado')->default('');
            $table->string('idiomaptbr')->default('');
            $table->string('idiomaingles')->default('');
            $table->string('idiomaespanhol')->default('');
            $table->string('lattes')->default('');
            $table->string('facebook')->default('');
            $table->string('linkedin')->default('');
            $table->string('instagram')->default('');
            $table->string('twitter')->default('');
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
        Schema::dropIfExists('perfil_alunos');
    }
}
