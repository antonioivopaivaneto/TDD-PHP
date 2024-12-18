<?php

use App\Loja\FluxoDeCaixa\Boleto;
use App\Loja\FluxoDeCaixa\Fatura;
use App\Loja\FluxoDeCaixa\ProcessadorDeBoletos;
use PHPUnit\Framework\TestCase;

class ProcessadorDeBoletosTest extends TestCase
{

    public function testDeveProcessarPagamentoViaBoletoUnico(){

        $processador = new ProcessadorDeBoletos();

        $fatura = new Fatura('Cliente',150.0);
        $boleto = new Boleto(150.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);

        $processador->processa($boletos,$fatura);

        $this->assertEquals(1,count($fatura->getPagamentos()));
        $this->assertEquals(150.0,$fatura->getPagamentos()[0]->getValor(),0.00001);



    }

    public function testDeveProcessarPagamentoViaMuitosBoletos()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new Fatura("Cliente",300.0);

        $boleto1 = new Boleto(100.0);
        $boleto2 = new Boleto(200.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto1);
        $boletos->append($boleto2);

        $processador->processa($boletos,$fatura);

        $this->assertEquals(2,count($fatura->getPagamentos()));

        $valor1 = $fatura->getPagamentos()[0]->getValor();
        $this->assertEquals(100,$valor1);

        $valor2 = $fatura->getPagamentos()[0]->getValor();
        $this->assertEquals(100,$valor2);

    }

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