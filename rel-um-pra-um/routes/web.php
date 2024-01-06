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

use App\Cliente;
use App\Endereco;

use Illuminate\Support\Facades\Route;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    if(count($clientes) > 0) {
        foreach($clientes as $c) {
            echo "<p>ID: " . $c->id . "</p>";
            echo "<p>Nome: " . $c->nome . "</p>";
            echo "<p>Telefone: " . $c->telefone . "</p>";
            
            echo "<p>ID: " . $c->endereco->id . "</p>";
            echo "<p>Rua: " . $c->endereco->rua . "</p>";
            echo "<p>Número: " . $c->endereco->numero . "</p>";
            echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
            echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
            echo "<p>UF: " . $c->endereco->uf . "</p>";
            echo "<p>CEP: " . $c->endereco->cep . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Não há clientes cadastrados</p>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();

    if(count($enderecos) > 0) {
        foreach($enderecos as $e) {
            echo "<p>ID: " . $e->id . "</p>";
            echo "<p>Rua: " . $e->rua . "</p>";
            echo "<p>Número: " . $e->numero . "</p>";
            echo "<p>Bairro: " . $e->bairro . "</p>";
            echo "<p>Cidade: " . $e->cidade . "</p>";
            echo "<p>UF: " . $e->uf . "</p>";
            echo "<p>CEP: " . $e->cep . "</p>";
            
            echo "<hr>";
        }
    } else {
        echo "<p>Não há endereços cadastrados</p>";
    }
});

Route::get('/salvar', function() {

    $c1 = new Cliente();
    $c1->nome = 'Amanda Mendes';
    $c1->telefone = '11 95687-9874';

    $c2 = new Cliente();
    $c2->nome = 'Thiago Fernandes';
    $c2->telefone = '11 94576-3214';

    $c1->save();
    $c2->save();

    $e1 = new Endereco();
    $e1->cliente_id = 1;
    $e1->rua = 'Rua 1';
    $e1->numero = 456;
    $e1->bairro = 'Petrovale';
    $e1->cidade = 'Betim';
    $e1->uf = 'MG';
    $e1->cep = '65498-987';
    $e1->save();

    $e2 = new Endereco();
    $e2->cliente_id = 2;
    $e2->rua = 'Rua 2';
    $e2->numero = 500;
    $e2->bairro = 'Petrovale';
    $e2->cidade = 'Betim';
    $e2->uf = 'MG';
    $e2->cep = '65498-321';
    $e2->save();

});
