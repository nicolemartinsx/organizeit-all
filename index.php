<?php
require("vendor/autoload.php");

use Pecee\SimpleRouter\SimpleRouter as Router;



Router::get('/', 'InicialController@index');

Router::get('/mapa', 'MapaController@index');

Router::get('/pesquisa', 'PesquisaController@index');
Router::get('/em-alta', 'PesquisaController@emAlta');
Router::get('/filme/cadastrar', 'CadastrarFilmeController@index');
Router::post('/filme/cadastrar', 'CadastrarFilmeController@cadastrar');
Router::get('/filme/{id}', 'FilmeController@index');
Router::get('/filme/{id}', 'FilmeController@index');

Router::get('/filme/{id}/adicionar', 'FilmeController@AddWatchlist');
Router::get('/filme/{id}/remover', 'FilmeController@RemoverWatchlist');

Router::get('/reviews/{id}', 'ReviewsController@MostrarReviews');
Router::get('/reviews/{id}/deletar/{filme}', 'ReviewsController@DeletarReview');

Router::post('/filme/{id}', 'FilmeController@AdicionarReview');

Router::get('/perfil/{id}', 'PerfilController@MostrarPerfil');

Router::get('/watchlist', 'WatchlistController@MostrarWatchlist');

Router::get('/login', 'LoginController@Login');
Router::post('/login', 'LoginController@RealizarLogin');

Router::get('/cadastro', 'CadastraruserController@Cadastraruser');
Router::post('/cadastro', 'CadastraruserController@RealizarCadastro');

Router::get('/logout', 'logout@logout');

Router::start();
