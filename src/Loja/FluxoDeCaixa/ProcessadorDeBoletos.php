<?php

namespace  App\Loja\FluxoDeCaixa;

use ArrayObject;

class ProcessadorDeBoletos
{
    public function processa(ArrayObject $boletos,Fatura $fatura)
    {
        $pagamentosFatura = $fatura->getPagamentos();
        foreach($boletos as $boleto){
            $pagamento = new Pagamento($boleto->getValor(),MeioPagamento::BOLETO);
            $fatura->adicinarPagamento($pagamento);

        }
    }
}