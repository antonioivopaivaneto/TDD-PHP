<?php
namespace App\Loja\Test\Builder;

use App\Loja\Carrinho\CarrinhoDeCompras;
use App\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    public $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
        
    }

    public function comItens()
    {
        $valores = func_get_args();
        foreach ($valores as $valor){
            $this->carrinho->adicionar(new Produto('Item', $valor));
        }
        return $this;
    }

    public function cria()
    {
        return $this->carrinho;
    }

}