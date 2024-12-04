<?php

namespace  App\Loja\FluxoDeCaixa;

class Boleto
{

    public float  $valor;

    public function __construct($valor){
        $this->valor = $valor;

    }

    public function getValor(){
        return $this->valor;
    }

}