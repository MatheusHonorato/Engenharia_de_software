<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_empresa');
            $table->string('cnpj')->default('');
            $table->string('telefone')->default('');
            $table->string('estado')->default('');
            $table->string('cidade')->default('');
            $table->string('bairro')->default('');
            $table->string('logadouro')->default('');
            $table->integer('numero')->default('0');
            $table->string('complemento')->default('');
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
        Schema::dropIfExists('perfil_empresas');
    }
}
