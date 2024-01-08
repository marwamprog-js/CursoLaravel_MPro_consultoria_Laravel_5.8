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
            echo "<p>Nome: " . $e->cliente->nome . "</p>";
            echo "<p>Telefone: " . $e->cliente->telefone . "</p>";
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

Route::get('/clientes/json', function() {

    //Lazy loader (Carregamento Preguiçoso) -> não será carregado quando não solicitado. Só sera carregado caso vc solicite.    

    //$clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get(); //Recebe mais de um relacionamento
    return $clientes->toJson();

});

Route::get('/enderecos/json', function() {

    //Lazy loader (Carregamento Preguiçoso) -> não será carregado quando não solicitado. Só sera carregado caso vc solicite.    

    // $enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get(); //Recebe mais de um relacionamento
    return $enderecos->toJson();

});

Route::get('/salvar', function() {

    //Salvando com Relacionamento
    $c1 = new Cliente();
    $c1->nome = 'Amélia Santana';
    $c1->telefone = '11 95498-9874';
    $c1->save();

    $e1 = new Endereco();
    $e1->rua = 'Rua 1';
    $e1->numero = 456;
    $e1->bairro = 'Petrovale';
    $e1->cidade = 'Betim';
    $e1->uf = 'MG';
    $e1->cep = '65498-753';
    $c1->endereco()->save($e1);

    //Salvando SEM Relacionamento
    $c2 = new Cliente();
    $c2->nome = 'Camila Fernanda';
    $c2->telefone = '12 92587-8523';
    $c2->save();

    // var_dump($c2);

    $e2 = new Endereco();
    $e2->cliente_id = $c2->id; //Tem q passar ID manual
    $e2->rua = 'Rua 2';
    $e2->numero = 500;
    $e2->bairro = 'Cascata';
    $e2->cidade = 'Betim';
    $e2->uf = 'MG';
    $e2->cep = '65498-321';
    $e2->save();

});
