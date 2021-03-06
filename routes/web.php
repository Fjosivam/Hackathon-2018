<?php



$this->get('/', 'DenunciaController@index')->name('denuncia');
$this->get('/denunciar', 'DenunciaController@cadDenuncia')->name('cadDenuncia');
$this->get('/aprender', 'DenunciaController@aprendizagem')->name('aprendizagem');
$this->get('/listar', 'DenunciaController@listagem')->name('listagemDenuncia');
$this->get('/bonus', 'DenunciaController@pontos')->name('pontos');
$this->get('/sobre', 'DenunciaController@sobre')->name('sobre');
Route::post('/denuncias/criar', 'DenunciaController@create')->name('create');
Route::get('/apresentar/denuncias','DenunciaController@mostrar')->name('mostrarDenuncia');
Route::get('/pesquisar/cidade','DenunciaController@pesquisarCidade')->name('pesquisarCidade');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
