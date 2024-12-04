<?php

namespace  App\Loja\Produto;

class Produto
{

    private $nome;
    private $valor;
    private $status;

    public function __construct($nome, $valor,$status)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->status = $status;
    }

    function getNome()
    {
        return $this->nome;
    }
    function getStatus()
    {
        return $this->status;
    }
    function getValor()
    {
        return $this->valor;
    }
}
