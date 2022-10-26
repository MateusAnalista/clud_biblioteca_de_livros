<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivrosRequest;
use App\Http\Requests\UpdateLivrosRequest;
use App\Models\Generos;
use App\Models\Livros;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livros::all();
        // dd($livros);
        return view('admin.livros.list', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Generos::all()->pluck('titulo', 'id')->toArray();
        return view('admin.livros.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLivrosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLivrosRequest $request)
    {
        $livro = new Livros;
        $livro->role = $request->role;
        $livro->titulo = $request->titulo;
        $livro->editora = $request->editora;
        $livro->genero_id = $request->genero_id;
        $livro->user_id = $request->user_id;
        $livro->descricao = $request->descricao;

        //upload the image file
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()):
            $requestImagem = $request->imagem;
            $extension = $requestImagem->extension();
            $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImagem->move(public_path('img/livros'), $imagemName); 
            $livro->imagem = $imagemName;
        endif;
        
        //upload the pdf file

        if($request->hasFile('pdf') && $request->file('pdf')->isValid()):
            $requestPdf = $request->pdf;
            $extension = $requestPdf->extension();
            $pdfName = md5($requestPdf->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestPdf->move(public_path('img/livros'), $pdfName); 
            $livro->pdf = $pdfName;
        endif;

        // dd($livro);
       $livro->save();
        
       return redirect()->route('admin.livros.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livros  $livros
     * @return \Illuminate\Http\Response
     */
    public function show(Livros $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livros  $livros
     * @return \Illuminate\Http\Response
     */
    public function edit(Livros $livro)
    {
        //2
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivrosRequest  $request
     * @param  \App\Models\Livros  $livros
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLivrosRequest $request, Livros $livro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livros  $livros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livros $livro)
    {
        $livro->delete();
        return redirect()->route('admin.livros.list');
    }
}
