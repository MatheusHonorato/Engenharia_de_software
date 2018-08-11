<?php

// rotas aluno
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeUserController@index')->name('home');
	
	Route::get('/user/home/matches', 'HomeUserController@matchIndex')->name('user.match');


	Route::get('user/home/perfil', 'HomeUserController@perfilIndex')->name('user.home.perfil.index');
	Route::post('user/home/perfil', 'HomeUserController@perfilIndexUpdate')->name('user.home.perfil.submit');

	Route::get('/user/home/atuacao', 'HomeUserController@atuacaoIndex')->name('user.home.atuacao');
	Route::post('/user/home/atuacao', 'HomeUserController@atuacaoStore')->name('home.cadastro.user.atuacao.store');
	Route::post('user/home/atuacao/excluir', 'HomeUserController@atuacoesExcluir')->name('home.cadastro.atuacao.excluir');

	Route::post('/user/home/atuacao/update', 'HomeUserController@atuacaoUpdate')->name('user.home.atuacao.update');


	Route::get('/user/home/cursos', 'HomeUserController@cursosIndex')->name('user.home.cursos');
	Route::post('/user/home/cursos', 'HomeUserController@cursosStore')->name('home.cadastro.user.cursos.store');
	Route::post('/user/home/cursos/delete', 'HomeUserController@cursosExcluir')->name('home.cadastro.user.cursos.excluir');


	Route::get('/user/home/habilidades', 'HomeUserController@habilidadesIndex')->name('user.home.habilidades');
	Route::post('/user/home/habilidades', 'HomeUserController@habilidadesStore')->name('home.cadastro.user.habilidades.store');
	Route::post('/user/home/habilidades/delete', 'HomeUserController@habilidadesExcluir')->name('home.cadastro.user.habilidades.excluir');

	//Conhecimento
	Route::get('user/home/conhecimentos', 'HomeUserController@conhecimentosIndex')->name('user.home.conhecimentos');

	Route::post('user/home/conhecimentos', 'HomeUserController@conhecimentosStore')->name('home.cadastro.conhecimento.store');

	Route::post('user/home/conhecimento/update', 'HomeUserController@conhecimentosUpdate')->name('admin.home.cadastro.conhecimentos.update');

	Route::post('user/home/conhecimento/excluir', 'HomeUserController@conhecimentosExcluir')->name('home.cadastro.conhecimentos.excluir');
	
});

//rotas gerais
Route::get('/', 'GeralController@welcome')->name('welcome');

Route::get('geral/register', 'GeralController@indexRegister')->name('geral.register');

Route::get('geral/login', 'GeralController@indexLogin')->name('geral.login');
//

//rotas admin
Route::group(['middleware' => 'admin_guest'], function() {
	Route::get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
	Route::post('admin/register', 'AdminAuth\RegisterController@register');
	Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'AdminAuth\LoginController@login');
});

Route::group(['middleware' => 'admin_auth'], function(){
	Route::post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
	Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');


	//notificações aluno
	Route::get('admin/home/notificacoes/aluno', 'Admin\HomeController@notificacoesIndexAluno')->name('admin.home.notificacoes.aluno');
	Route::post('admin/home/notificacoes/aluno/delete', 'Admin\HomeController@notificacoesExcluirUser')->name('admin.notificacoes.home.aluno.delete');
	Route::post('admin/home/notificacoes/aluno/acept', 'Admin\HomeController@notificacoesAceptUser')->name('admin.notificacoes.home.aluno.acept');

	//notificações empresa
	Route::get('admin/home/notificacoes/empresa', 'Admin\HomeController@notificacoesIndexEmp')->name('admin.home.notificacoes.emp');

	Route::post('admin/home/notificacoes/empresa/apagar', 'Admin\HomeController@notificacoesExcluirEmp')->name('admin.notificacoes.home.emp.delete');

	Route::post('admin/home/notificacoes/aceitar', 'Admin\HomeController@notificacoesAceptEmp')->name('admin.notificacoes.home.emp.acept');

	//areas
	Route::get('admin/home/areas/lista', 'Admin\HomeController@areasIndex')->name('admin.home.cadastro.areas.index');

	Route::post('admin/home/areas/excluir', 'Admin\HomeController@areasExcluir')->name('admin.home.cadastro.areas.excluir');

	Route::get('admin/home/areas/criar', 'Admin\HomeController@areasCreate')->name('admin.home.cadastro.areas.criar');

	Route::post('admin/home/areas/criar', 'Admin\HomeController@areasStore')->name('admin.home.cadastro.areas.store');

	Route::post('admin/home/areas/update', 'Admin\HomeController@areasUpdate')->name('admin.home.cadastro.areas.update');


	//perfil
	Route::get('admin/home/perfil', 'Admin\HomeController@perfilIndex')->name('admin.home.perfil.index');
	Route::post('admin/home/perfil', 'Admin\HomeController@perfilIndexUpdate')->name('admin.home.perfil.index.update');
	//

	//habilidades
	Route::get('admin/home/habilidades/lista', 'Admin\HomeController@habilidadesIndex')->name('admin.home.cadastro.habilidades.index');

	Route::post('admin/home/habilidades/excluir', 'Admin\HomeController@habilidadesExcluir')->name('admin.home.cadastro.habilidades.excluir');

	Route::post('admin/home/habilidades/criar', 'Admin\HomeController@habilidadesStore')->name('admin.home.cadastro.habilidades.store');

	Route::post('admin/home/habilidades/update', 'Admin\HomeController@habilidadesUpdate')->name('admin.home.cadastro.habilidades.update');

	//

	//categorias
	Route::get('admin/home/categorias/lista', 'Admin\HomeController@categoriasIndex')->name('admin.home.cadastro.categorias.index');

	Route::post('admin/home/categorias/excluir', 'Admin\HomeController@categoriasExcluir')->name('admin.home.cadastro.categorias.excluir');

	Route::get('admin/home/categorias/criar', 'Admin\HomeController@categoriasCreate')->name('admin.home.cadastro.categorias.criar');

	Route::post('admin/home/categorias/criar', 'Admin\HomeController@categoriasStore')->name('admin.home.cadastro.categorias.store');

	Route::post('admin/home/categorias/update', 'Admin\HomeController@categoriasUpdate')->name('admin.home.cadastro.categorias.update');

	//

	//cursos
	Route::get('admin/home/cursos/lista', 'Admin\HomeController@cursosIndex')->name('admin.home.cadastro.cursos.index');

	Route::post('admin/home/cursos/excluir', 'Admin\HomeController@cursosExcluir')->name('admin.home.cadastro.cursos.excluir');

	Route::get('admin/home/cursos/criar', 'Admin\HomeController@cursosCreate')->name('admin.home.cadastro.cursos.criar');

	Route::post('admin/home/cursos/criar', 'Admin\HomeController@cursosStore')->name('admin.home.cadastro.cursos.store');

	Route::get('admin/home/cursos/editar', 'Admin\HomeController@cursosEditar')->name('admin.home.cadastro.cursos.edit');

	Route::post('admin/home/cursos/editar', 'Admin\HomeController@cursosUpdate')->name('admin.home.cadastro.cursos.update');
	//

	//Estatísticas
	Route::get('admin/home/estatisticas', 'Admin\HomeController@estatisticasIndex')->name('admin.home.esatisticas');

	//Atuacoes
	Route::get('admin/home/atuacoes/lista', 'Admin\HomeController@atuacoesIndex')->name('admin.home.cadastro.atuacoes.index');

	Route::post('admin/home/atuacoes/store', 'Admin\HomeController@atuacoesStore')->name('admin.home.cadastro.atuacoes.store');

	Route::post('admin/home/atuacoes/update', 'Admin\HomeController@atuacoesUpdate')->name('admin.home.cadastro.atuacoes.update');

	Route::post('admin/home/atuacoes/excluir', 'Admin\HomeController@atuacoesExcluir')->name('admin.home.cadastro.atuacoes.excluir');

	//Conhecimento
	Route::get('admin/home/conhecimentos', 'Admin\HomeController@conhecimentosIndex')->name('admin.home.cadastro.conhecimentos.index');

	Route::post('admin/home/conhecimentos', 'Admin\HomeController@conhecimentosStore')->name('admin.home.cadastro.conhecimentos.store');

	Route::post('admin/home/conhecimento/update', 'Admin\HomeController@conhecimentosUpdate')->name('admin.home.cadastro.conhecimentos.update');

	Route::post('admin/home/conhecimento/excluir', 'Admin\HomeController@conhecimentosExcluir')->name('admin.home.cadastro.conhecimentos.excluir');

	//Matches
	Route::get('admin/home/matches', 'Admin\HomeController@matchIndex')->name('admin.home.match.index');
});
//


// rotas empresa
Route::group(['middleware' => 'emp_guest'], function() {
	Route::get('emp/register', 'EmpAuth\RegisterController@showRegistrationForm')->name('emp.register');
	Route::post('emp/register', 'EmpAuth\RegisterController@register');
	Route::get('emp/login', 'EmpAuth\LoginController@showLoginForm')->name('emp.login');
	Route::post('emp/login', 'EmpAuth\LoginController@login');
});

Route::group(['middleware' => 'emp_auth'], function(){
	Route::post('emp/logout', 'EmpAuth\LoginController@logout')->name('emp.logout');
	
	Route::get('emp/home', 'Emp\HomeController@index')->name('emp.home');
	Route::get('emp/home/perfil', 'Emp\HomeController@perfilIndex')->name('emp.home.perfil.index');
	Route::post('emp/home/perfil', 'Emp\HomeController@perfilIndexUpdate')->name('emp.home.perfil.submit');

	Route::get('emp/oportunidades', 'Emp\HomeController@oportunidadesIndex')->name('emp.home.oportunidades.index');
	Route::post('emp/oportunidades', 'Emp\HomeController@oportunidadesStore')->name('emp.home.oportunidades.store');
	Route::post('emp/match', 'Emp\HomeController@matchIndex')->name('emp.home.match.index');
});
//

