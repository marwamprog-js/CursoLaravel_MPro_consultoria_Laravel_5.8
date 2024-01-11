<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosControlador extends Controller
{
    public function index() {
        return response()->json([
            ['id' => 1, 'nome' => 'Produto 1'],
            ['id' => 2, 'nome' => 'Produto 2'],
            ['id' => 3, 'nome' => 'Produto 3'],
            ['id' => 4, 'nome' => 'Produto 4'],
        ], 200);
    }
}
