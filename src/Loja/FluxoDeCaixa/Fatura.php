<?php

namespace  App\Loja\FluxoDeCaixa;

class Fatura
{

    private bool  $pago = false;
    public string  $cliente;
    public float  $valor;
    public array  $pagamentos = [];

    public function __construct($cliente,$valor){
        $this->cliente = $cliente;
        $this->valor = $valor;

    }

    public function adicinarPagamento(Pagamento $pagamento)
    {
        $this->pagamentos[] = $pagamento;
        $valorTotal = 0 ;

        foreach($this->pagamentos as $p){
            $valorTotal += $p->getValor();
        }
        if($valorTotal >= $this->valor){
            $this->pago = true;
        }
    }

    public function getPagamentos(){
        return $this->pagamentos;
    }
    public function getValor(){
        return $this->valor;
    }

    public function setPago($isPago){
        $this->pago = $isPago;

    }
    public function getPago(){
        return $this->pago ;

    }
}