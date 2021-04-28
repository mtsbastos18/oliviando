<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function create()
    {
        return view('produtos.create');
    }

    public function list()
    {
        $listaProdutos = Produto::orderBy('created_at','desc')->get();
        
        return view('produtos.list', ['listaProdutos' => $listaProdutos]);
    }

    public function store(Request $request)
    { // adicionar peso do produto
        $produto = Produto::create([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'custo' => str_replace(',','.',$request->custo),
            'preco' => str_replace(',','.',$request->preco),
            'largura' => $request->largura,
            'altura' => $request->altura,
            'profundidade' => $request->profundidade,
            'quantidade' => $request->quantidade,
            'descricao' => $request->descricao,
            'usuario_criacao' => Auth::id(),
        ]);
        
        if ($request->has('imagem_produto')){
            $imagem = $request->imagem_produto;
            $nomeImagem = "produto-" . $produto->id . '.' . $imagem->extension();
            $imagem->move(public_path('produtos_imagens'), $nomeImagem);
            
            $produto->update([
                'imagem' => 'produtos_imagens/'.$nomeImagem,
            ]);
        }

        return redirect('/produtos')->with('success', 'Produto criado com sucesso.');
    }

    public function edit($id) {
        $produto = Produto::with('usuarioCriacao')->with('usuarioAtualizacao')->findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        
        $produto->update([
            'codigo' => $request->codigo,   
            'nome' => $request->nome,
            'custo' => str_replace(',','.',$request->custo),
            'preco' => str_replace(',','.',$request->preco),
            'quantidade' => $request->quantidade,
            'descricao' => $request->descricao,
            'largura' => $request->largura,
            'altura' => $request->altura,
            'profundidade' => $request->profundidade,
            'usuario_atualizacao' => Auth::id()
        ]);

        if ($request->has('imagem_produto')){
            $imagem = $request->imagem_produto;
            $nomeImagem = "produto-" . $produto->id . '.' . $imagem->extension();
            $imagem->move(public_path('produtos_imagens'), $nomeImagem);
            
            $produto->update([
                'imagem' => 'produtos_imagens/'.$nomeImagem,
            ]);
        }

        return redirect('/produtos')->with('success', 'Produto atualizado com sucesso.');

    }
}
