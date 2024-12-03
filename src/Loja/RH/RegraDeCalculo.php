<?php

namespace App\Loja\RH;


abstract class RegraDeCalculo
{
 
                public function calcula(Funcionario $funcionario)
                {
                    $salario = $funcionario->getSalario();

                    if($salario > $this->limite()){
                        return $salario * $this->porcentagemAcimaDoLimite();
            
                    }

                    return $salario * $this->porcentageBase();
                    
                }

   abstract  protected function limite();
   abstract protected function porcentagemAcimaDoLimite();
   abstract protected function porcentageBase();

}