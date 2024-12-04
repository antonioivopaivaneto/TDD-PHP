<?php

use App\Loja\FluxoDeCaixa\Boleto;
use App\Loja\FluxoDeCaixa\Fatura;
use App\Loja\FluxoDeCaixa\ProcessadorDeBoletos;
use PHPUnit\Framework\TestCase;

class FaturaTest extends TestCase
{

 


    public function testDeveMarcarFaturaComoPagoCasoBoletoUnicoPagueTudo()
    {
        $processador = new ProcessadorDeBoletos();
        $fatura = new Fatura('Cliente',150.0);

        $boletos = new ArrayObject();
        $boletos->append(new Boleto(150.0));

        $processador->processa($boletos,$fatura);

        $this->assertTrue($fatura->getPago());
    }


}