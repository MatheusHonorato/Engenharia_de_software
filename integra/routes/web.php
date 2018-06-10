<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// rotas aluno
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeUserController@index')->name('home');
	Route::get('user/home/perfil', 'HomeUserController@perfilIndex')->name('user.home.perfil.index');
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


	//perrfil
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
	Route::get('emp/home', function(){
	  return view('emp.home');
	});
});
//

