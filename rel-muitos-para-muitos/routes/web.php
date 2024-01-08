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

use App\Desenvolvedor;
use App\Projeto;
use Illuminate\Support\Facades\Route;

Route::get('/desenvolvedor-projeto', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach($desenvolvedores as $d) {
        echo "<p>Nome do Desenvolvedor: ". $d->nome ." </p>";
        echo "<p>Cargo: ". $d->cargo ." </p>";
        echo "------------Projetos<br>";
        if(count($d->projetos) > 0) {
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li>Nome: ". $p->nome ."</li>";
                echo "<li>Horas do projeto: ". $p->estimativa_horas ."</li>";
                echo "<li>Horas Trabalhadas: ". $p->pivot->horas_semanais ."</li>";
                echo "<br>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    // return $desenvolvedores->toJson();
});

Route::get('projeto-desenvolvedores', function() {

    $projetos = Projeto::with('desenvolvedores')->get();

    foreach($projetos as $p) {
        echo "<p>Nome do projeto: ". $p->nome ." </p>";
        echo "<p>Estimativas de horas: ". $p->estimativa_horas ." </p>";
        echo "------------Desenvolvedores<br>";
        if(count($p->desenvolvedores) > 0) {
            echo "<ul>";
            foreach($p->desenvolvedores as $d) {
                echo "<li>Nome do desenvolvedor: ". $d->nome ."</li>";
                echo "<li>Cargo: ". $d->cargo ."</li>";
                echo "<li>Horas Trabalhadas: ". $d->pivot->horas_semanais ."</li>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "<p>Não há desenvolvedores alocados</p>";
        }
        echo "<hr>";
    }

    // return $projetos->toJson();

});

Route::get('alocar', function() {
    
    $proj = Projeto::find(4);

    if(isset($proj)) {
        //$proj->desenvolvedores()->attach(1, ['horas_semanais' => 50]);
        $proj->desenvolvedores()->attach([
            1 => ['horas_semanais' => 20],
            2 => ['horas_semanais' => 20],
            3 => ['horas_semanais' => 30],
        ]);
    } 

});

Route::get('desalocar', function() {
    
    $proj = Projeto::find(4);

    if(isset($proj)) {
        //$proj->desenvolvedores()->attach(1, ['horas_semanais' => 50]);
        $proj->desenvolvedores()->detach([1,2,3]);
    }

});