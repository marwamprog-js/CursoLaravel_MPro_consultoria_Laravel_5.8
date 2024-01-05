<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacao de formulário
        /*
        $request->validate([
            'nome' => 'required|min:3|max:20',
            'email' => 'required|email|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5'
        ]);
        */

        //Outro tipo de validação
        $regras = [
            'nome' => 'required|min:3|max:20',
            'email' => 'required|email|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5'
        ];
        $mensagens = [
            'required' => 'O :attribute é requerido', //generico
            'nome.min' => 'O Nome deve conter no mínimo 3 caracteres',
            'nome.max' => 'O Nome deve conter no máximo 20 caracteres',
            'email.required' => 'Favor informar um endereço de email',
            'email.email' => 'Email inválido',
            'email.unique' => 'O Email já existe, favor inserir outro email.',
            'idade.required' => 'A Idade é requerido',
            'endereco.required' => 'O Endereço é requerido',
            'endereco.min' => 'O Endereço deve conter no mínimo 5 caracteres',
        ];
        $request->validate($regras, $mensagens);


        //Salvando
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->save();


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
