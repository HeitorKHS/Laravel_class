<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;
use \App\Models\Categoria;
use Illuminate\Support\Str;     

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return "index";
        $produtos = Produto::paginate(5); //O all ele mapea automatica 
        $categorias = Categoria::all();
        //$produtos = Produto::paginate(3); //O paginate ele divite os produtos por pagina
        //return dd($produtos); //dd para debugar o objeto

        //return view('site/home', compact('produtos'));
        return view('admin/produtos', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        if($request->imagem)
        {
            $produto['imagem'] = $request->imagem->store('produtos');   
        }

        $produto['slug'] = Str::slug($request->nome);

        $produto = Produto::create($produto);

        return redirect()->route('admin/produtos')->with('Sucesso', 'Produto cadastrado com sucesso!');
    
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
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete;
        return redirect()->route('admin/produtos')->with('sucesso', 'Produto removido com sucesso!');
    }
}
