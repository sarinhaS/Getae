<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiasRequest;
use App\Models\Noticias;


class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticias::all();
        
        return view('noticias.index',[
            'noticias' => $noticias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("noticias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticiasRequest $request)
    {
        $dados = $request->validated();
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('noticias', 'public');
            $dados['imagem'] = $caminhoImagem;
        }
        Noticias::create($dados);
        return redirect()-> route('noticias.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticias $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index');
    }
}
