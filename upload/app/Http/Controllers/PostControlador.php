<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new Post();
        $post->email = $request->input('email');
        $post->mensagem = $request->input('mensagem');
        $post->arquivo = $path;//$request->input('arquivo');

        $post->save();

        return redirect()->route('index');
    }

    public function download($id) 
    {
        $post = Post::find($id);

        if(isset($post)) {
            // $path = url('/') . Storage::url($post->arquivo);
            $path = Storage::url($post->arquivo);
            // dd($path);
            return redirect($path);
        }

        return redirect()->route('index');
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
        $post = Post::find($id);

        if(isset($post)) {

            $arquivo = $post->arquivo;
            Storage::disk('public')->delete($arquivo);

            $post->delete();
        }

        return redirect()->route('index');
    }
}
