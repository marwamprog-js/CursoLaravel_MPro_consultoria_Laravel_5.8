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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function() {
    return "Acesso negado";
})->name('negado');

Route::post('/login', function (Request $req) {

    $login_ok = false;

    switch($req->input('user')) {
        case 'joao':
            $login_ok = $req->input('password') === "senhajoao";
            break;
        case 'marcos':
            $login_ok = $req->input('password') === "senhamarcos";
            break;
        case 'default':
            $login_ok = false;
    }

    if($login_ok) {
        $login = ['user' => $req->input('user')];
        $req->session()->put('login', $login);
        return response("Login OK", 200);
    } else {
        $req->session()->flush();
        return response("Erro no login", 404);
    }

});

Route::get('/logout', function(Request $req) {
    $req->session()->flush();
    return response('Deslogado com sucesso', 200);
});