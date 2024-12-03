<?php

namespace  App\Loja\FluxoDeCaixa;

use DateTime;

class GeradorDeNotaFiscal
{
    private $dao;
    private $sap;


    public function __construct(NFDao $dao,Sap $sap){
        $this->dao = $dao;
        $this->sap = $sap;

    }
    public function gera(Pedido $pedido){

       $nf =  new NotaFiscal($pedido->getCliente(),$pedido->getValorTotal() * 0.94, new DateTime());

       if($this->dao->persiste($nf) && $this->sap->envia($nf)){
        return $nf;

       }
       return null;
    }

}