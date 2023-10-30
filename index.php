<?php
require("vendor/autoload.php");

use Pecee\SimpleRouter\SimpleRouter as Router;



Router::get('/', 'InicialController@index');

Router::get('/watchlist', 'WatchlistController@MostrarWatchlist');

Router::get('/pesquisa', 'PesquisaController@index');
Router::get('/em-alta', 'PesquisaController@emAlta');
Router::get('/filme/cadastrar', 'CadastrarFilmeController@index');
Router::post('/filme/cadastrar', 'CadastrarFilmeController@cadastrar');
Router::get('/filme/{id}', 'FilmeController@index');
Router::get('/filme/{id}', 'FilmeController@index');

Router::get('/filme/{id}/adicionar', 'FilmeController@AddWatchlist');
Router::get('/filme/{id}/remover', 'FilmeController@RemoverWatchlist');

Router::get('/reviews/{id}','ReviewsController@MostrarReviews');

Router::post('/filme/{id}', 'FilmeController@AdicionarReview');

Router::get('/perfil/{id}', 'PerfilController@MostrarPerfil');

Router::get('/watchlist', 'WatchlistController@MostrarWatchlist');

Router::start();