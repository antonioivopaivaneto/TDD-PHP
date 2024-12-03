<?php

namespace  App\Loja\FluxoDeCaixa;

use App\Exemplos\RelogioDoSistema;
use DateTime;

class GeradorDeNotaFiscal
{
    private $acoes;
    private $relogio;



    public function __construct($acoes, RelogioDoSistema $relogio){
        $this->acoes = $acoes;
        $this->relogio = $relogio;

    }
    public function gera(Pedido $pedido){

       $nf =  new NotaFiscal($pedido->getCliente(),$pedido->getValorTotal() * 0.94, $this->relogio->hoje());

       
       foreach($this->acoes as $acao){
        $acao->executa($nf);
       }
       return $nf;
    }

}