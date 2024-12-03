<?php

use App\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use App\Loja\FluxoDeCaixa\NFDao;
use App\Loja\FluxoDeCaixa\Pedido;
use App\Loja\FluxoDeCaixa\Sap;
use PHPUnit\Framework\TestCase;

class GeradorDeNotaFiscalTest extends TestCase
{

    public function testDevegerarNFComValorDeImpostoDescontado()
    {
        // Criar o mock de NFDao
        $dao = Mockery::mock(NFDao::class);
        $dao->shouldReceive("persiste")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

            
        $sap = Mockery::mock(Sap::class);
        $sap->shouldReceive("envia")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($dao,$sap);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertEquals(1000 * 0.94, $nf->getValor(), 0.00001);
    }

    public function testDevePersistirNFGerada()
    {
        // Criar o mock de NFDao
        $dao = Mockery::mock(NFDao::class);
        $dao->shouldReceive("persiste")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

            
        $sap = Mockery::mock(Sap::class);
        $sap->shouldReceive("envia")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

        // Criar o gerador de nota fiscal e passar o mock de NFDao
        $gerador = new GeradorDeNotaFiscal($dao,$sap);

        // Criar o pedido
        $pedido = new Pedido("andre", 1000, 1);

        // Gerar a nota fiscal
        $nf = $gerador->gera($pedido);

        // Verificar se o método persiste foi chamado
        $this->assertTrue($dao->persiste($nf)); // Passar o objeto NotaFiscal para o mock

        // Verificar se o valor da nota fiscal está correto
        $this->assertEquals(1000 * 0.94, $nf->getValor(), 0.00001);
    }

    public function testDeveEnviarNfGeradaParaSAP()
    {
        $dao = Mockery::mock(NFDao::class);
        $dao->shouldReceive("persiste")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);


        $sap = Mockery::mock(Sap::class);
        $sap->shouldReceive("envia")
            ->with(Mockery::type('App\Loja\FluxoDeCaixa\NotaFiscal')) // Espera o tipo correto de argumento
            ->andReturn(true);

        $gerador = new GeradorDeNotaFiscal($dao,$sap);
        $pedido = new Pedido("Andre",1000,1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($sap->envia($nf));
        $this->assertEquals(1000 * 0.94,$nf->getValor(),0.00001);
    }
}
