<?php

use App\Loja\Carrinho\CarrinhoDeCompras;
use App\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoDeComprasTest extends TestCase
{

    private $carrinho;

    protected function setUp():void
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(0,$valor,0.0001);
    }
    public function test_Deve_Retornar_Valor_Do_Item_Se_Carrinho_Com_1_Elemento()
    {
        $this->carrinho->adicionar(new Produto("Geladeira",9000.00,1));
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(9000.00,$valor,0.0001);
    }
    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adicionar(new Produto("Geladeira",2000.00,1));
        $this->carrinho->adicionar(new Produto("Fogão",1000.00,1));
        $this->carrinho->adicionar(new Produto("Lavadora",750.00,1));

        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(2000.00,$valor,0.0001);
    }
}