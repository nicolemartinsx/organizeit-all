<?php
require("vendor/autoload.php");

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', 'InicialController@index');
Router::get('/pesquisa', 'PesquisaController@index');
Router::get('/em-alta', 'PesquisaController@emAlta');
Router::get('/filme/cadastrar', 'CadastrarFilmeController@index');
Router::post('/filme/cadastrar', 'CadastrarFilmeController@cadastrar');
Router::get('/filme/{id}', 'FilmeController@index');

Router::start();