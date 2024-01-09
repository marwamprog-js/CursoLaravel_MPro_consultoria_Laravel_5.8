<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // $clientes = Cliente::all();
        $clientes = Cliente::paginate(10);
        return view('index', compact('clientes'));
    }

    public function indexjs()
    {       
        return view('indexjs');
    }

    public function indexJson()
    { 
        return Cliente::paginate(10);
    }


}
