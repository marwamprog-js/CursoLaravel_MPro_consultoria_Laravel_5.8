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

use App\Categoria;
use App\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', function () {
    $cats = Categoria::all();

    if(count($cats) > 0) {

        foreach($cats as $c) {
            echo "<p>". $c->id . " - " . $c->nome ."</p>";
        }

    } else {
        echo "<p>Você não possuí nenhuma categoria cadastrada.</p>";
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();

    if(count($prods) > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Estoque</th>";
            echo "<th>Preco</th>";
            echo "<th>Categoria</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach($prods as $p) {
            echo "<tr>";
            echo "<td>". $p->id ."</td>";
            echo "<td>". $p->nome ."</td>";
            echo "<td>". $p->estoque ."</td>";
            echo "<td>". $p->preco ."</td>";
            echo "<td>". $p->categoria->nome ."</td>";
            echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        

    } else {
        echo "<p>Você não possuí nenhuma categoria cadastrada.</p>";
    }
});

Route::get('/categorias-produtos', function () {
    $cats = Categoria::all();

    if(count($cats) > 0) {

        foreach($cats as $c) {
            echo "<p>". $c->id . " - " . $c->nome ."</p>";
            $produtos = $c->produtos;

            if(count($produtos) > 0) {
                echo "<ul>";
                foreach($produtos as $p) {
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }

        }

    } else {
        echo "<p>Você não possuí nenhuma categoria cadastrada.</p>";
    }
});

Route::get('/categoriasprodutos/json', function() {
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function() {
    
    $cat = Categoria::find(1);

    $p = new Produto();
    $p->nome = "Meu novo produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($cat);

    $p->save();
    return $p->toJson();

});
