<?php

use App\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use App\Loja\FluxoDeCaixa\IAcaoAposGerarNotaInterface;
use App\Loja\FluxoDeCaixa\NFDao;
use App\Loja\FluxoDeCaixa\NotaFiscal;
use App\Loja\FluxoDeCaixa\Pedido;
use App\Loja\FluxoDeCaixa\Sap;
use PHPUnit\Framework\TestCase;

class GeradorDeNotaFiscalTest extends TestCase
{

    public function testDeveInvocarAcoesPosteriores()
    {
        $acao1 = Mockery::mock(IAcaoAposGerarNotaInterface::class);
        $acao1->shouldReceive("executa")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);


        $acao2 = Mockery::mock(IAcaoAposGerarNotaInterface::class);
        $acao2->shouldReceive("executa")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

        $gerador = new GeradorDeNotaFiscal(array($acao1,$acao2));
        
        $pedido = new Pedido("Andre",1000,1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($acao1->executa($nf));
        $this->assertTrue($acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf(NotaFiscal::class,$nf);
    }
}
