<?php

namespace App\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario)
    {
        if($funcionario->getsalario() > 3000){
            return $funcionario->getsalario() * 0.8;
        }
        return $funcionario->getsalario() * 0.9;
        

    }
}