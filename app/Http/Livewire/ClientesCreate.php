<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClientesCreate extends Component
{
    public $cliente;
    public $clienteId;
    public $idUsuario, $nome, $cpf, $telefone,$endereco,$numero,$complemento,$cidade, $uf;
    public $success, $error;

    public function mount($clienteId)
    {
        $this->clienteId = $clienteId;

        if ($this->clienteId != null) {
            $this->cliente = Cliente::findOrfail($this->clienteId);

            $this->setData($this->cliente);
        }
    }

    public function render()
    {
        if ($this->clienteId == null) {
            return view('livewire.clientes-create');
        } else {
            return view('livewire.clientes-create');
        }
    }

    public function create()
    {
        Cliente::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'cidade' => $this->cidade,
            'uf' => $this->uf
        ]);

        $this->success = "Cliente salvo com sucesso.";

        $this->nome =
        $this->cpf =
        $this->telefone =
        $this->endereco =
        $this->numero = 
        $this->complemento =
        $this->cidade = 
        $this->uf = null;
    }

    public function update()
    {
        try {
            $this->cliente->update([
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'telefone' => $this->telefone,
                'endereco' => $this->endereco,
                'numero' => $this->numero,
                'complemento' => $this->complemento,
                'cidade' => $this->cidade,
                'uf' => $this->uf  
            ]);
            $this->success = "Cliente atualizado com sucesso.";
        } catch (\Throwable $th) {
            $this->error = "Cliente não atualizado. Revise as informações.";
        }
    }


    private function setData($cliente) {
        $this->idUsuario = $cliente->id;
        $this->nome = $cliente->nome;
        $this->cpf = $cliente->cpf;
        $this->telefone = $cliente->telefone;
        $this->endereco = $cliente->endereco;
        $this->numero = $cliente->numero;
        $this->complemento = $cliente->complemento;
        $this->cidade = $cliente->cidade;
        $this->uf = $cliente->uf;
    }
}
