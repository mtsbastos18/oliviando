<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClientesController extends Controller
{
    public function create()
    {
        return view('clientes.create');
    }

    public function list()
    {
        $listaClientes = Cliente::orderBy('created_at','desc')->get();
        
        return view('clientes.list', ['listaClientes' => $listaClientes]);
    }

    public function store()
    {
        # code...
    }

    public function edit($id)
    {
        return view('clientes.edit', ['id' => $id]);
    }

    public function update()
    {
        # code...
    }
    
}
