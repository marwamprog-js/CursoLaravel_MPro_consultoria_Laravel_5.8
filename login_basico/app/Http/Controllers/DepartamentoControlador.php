<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
    public function index() {
        echo "<h4>Lista de departamentos</h4>";
        echo "<ul>";
        echo "<li>RH</li>";
        echo "<li>TI</li>";
        echo "<li>Contabilidade</li>";
        echo "</ul>";
        echo "<hr>";

        if(Auth::check()) {
            $user = Auth::user();
            echo "<h4>Você esta logado!</h4>";
            echo "<p>" . $user->id . "</p>";
            echo "<p>" . $user->name . "</p>";
            echo "<p>" . $user->email . "</p>";
        }else {
            echo "<h4>Você não esta logado</h4>";
        }
    }
}
