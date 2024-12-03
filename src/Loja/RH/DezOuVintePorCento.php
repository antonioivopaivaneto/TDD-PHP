<?php

namespace App\Loja\RH;

class DezOuVintePorCento implements IRegraDeCalculo
{
    public function calcula(Funcionario $funcionario)
    {
        if($funcionario->getSalario() > 3000){
            return $funcionario->getSalario() * 0.8;

        }
        return $funcionario->getSalario() * 0.9;
    }
}
{


}