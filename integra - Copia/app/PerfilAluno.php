<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilAluno extends Model
{
    //Mass assignable attributes
	protected $fillable = [
	    'id_aluno', 'cod_matricula','periodo','telefone','bairro','idade','rua','nacionalidade','numero','cidade','estado','idiomas', 
	];

	//hidden attributes
	protected $hidden = [
	   
	];
}
