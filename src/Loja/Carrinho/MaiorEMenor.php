<?php
namespace App\Loja\Carrinho;

use App\Loja\Produto\Produto;

class MaiorEMenor{
    private ?Produto $menor = null;
    private ?Produto $maior = null;

    public function encontra(CarrinhoDeCompras $carrinho)
    {
        foreach($carrinho->getProdutos() as $produto){
            if($this->menor === null || $produto->getValor() < $this->menor->getValor()){
                $this->menor = $produto;

            }
             if($this->maior ===null || $produto->getValor() > $this->maior->getValor()){
                $this->maior  = $produto;
            }
        }

    }

    public function getMenor(){
        return $this->menor;
    }
    public function getMaior(){

        return $this->maior;
    }
}