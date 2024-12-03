<?php

namespace App\Loja\RH;

class QuinzeOuVintePorCento implements IRegraDeCalculo
{
    public function calcula(Funcionario $funcionario)
    {
        if($funcionario->getSalario() < 2500){
            return $funcionario->getSalario() * 0.85;

        }
        return $funcionario->getSalario() * 0.75;
    }
}
{


}