<?php

namespace App\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario)
    {
        $regraClass = $funcionario->getCargo()->getRegra();

        $regra = new $regraClass();

        return $regra->calculaSalario($funcionario);
       
    }

    
    
}
