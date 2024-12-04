<?php

namespace  App\Loja\FluxoDeCaixa;

class Pagamento
{

    public float  $valor;
    public string  $meioPagamento;

    public function __construct(float $valor,string $meioPagamento){
        $this->meioPagamento = $meioPagamento;
        $this->valor = $valor;

    }

    public function getValor():float
    {
        return $this->valor;
    }

    public function getMeioPagamento():string
    {
        return $this->meioPagamento;
    }


}