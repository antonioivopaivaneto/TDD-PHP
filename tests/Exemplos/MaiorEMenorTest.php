<?php

use App\Loja\Carrinho\CarrinhoDeCompras;
use App\Loja\Carrinho\MaiorEMenor;
use App\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class MaiorEMenorTest extends TestCase{


    public function testOrdemDescrescente()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adicinar(
            new Produto('Geladeira',450.00)
        );
        $carrinho->adicinar(
            new Produto('Liquidificador',250.00)
        );
        $carrinho->adicinar(
            new Produto('Jogo de pratos',70.00)
        );
        

        $maiorMenor = new MaiorEMenor();
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de pratos",$maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira",$maiorMenor->getMaior()->getNome());

    }
    public function testOrdemVariada()
    {
        $carrinho = new CarrinhoDeCompras();

       
        $carrinho->adicinar(
            new Produto('Liquidificador',250.00)
        );
        $carrinho->adicinar(
            new Produto('Geladeira',450.00)
        );
        $carrinho->adicinar(
            new Produto('Jogo de pratos',70.00)
        );
        

        $maiorMenor = new MaiorEMenor();
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Jogo de pratos",$maiorMenor->getMenor()->getNome());
        $this->assertEquals("Geladeira",$maiorMenor->getMaior()->getNome());

    }

    public function testUnicoPRodutoNoCarrinho(){
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adicinar(new Produto('Celular',4500));

        $maiorMenor =new MaiorEMenor();
        $maiorMenor->encontra($carrinho);

        $this->assertEquals("Celular",$maiorMenor->getMenor()->getNome());
        $this->assertEquals("Celular",$maiorMenor->getMenor()->getNome());
    }

}