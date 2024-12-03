<?php

namespace App\Loja\RH;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario)
    {
        if ($funcionario->getCargo() === "desenvolvedor") {


            return $this->dezOuVintePorCentoDeDesconto($funcionario);
        } else if ($funcionario->getCargo() === "dba" || $funcionario->getCargo() === "testador") {

            return $this->quinzeOuVintePorCentoDeDesconto($funcionario);
        }
        throw new \RuntimeException("Tipo de funcionario invalido");
    }

    private function dezOuVintePorCentoDeDesconto(Funcionario $funcionario)
    {
        if ($funcionario->getsalario() > 3000) {
            return $funcionario->getsalario() * 0.8;
        }
        return $funcionario->getsalario() * 0.9;
    }
    private function quinzeOuVintePorCentoDeDesconto(Funcionario $funcionario)
    {

        if ($funcionario->getsalario() > 2500) {
            return $funcionario->getsalario() * 0.85;
        }
        return $funcionario->getsalario() * 0.75;
    }
}
