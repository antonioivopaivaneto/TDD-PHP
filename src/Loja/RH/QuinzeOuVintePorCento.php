<?php

namespace App\Loja\RH;

class QuinzeOuVintePorCento extends RegraDeCalculo
{
    protected function porcentageBase()
    {
        return 0.9;
    }
    protected function PorcentagemAcimaDoLimite()
    {
        return 0.8;
    }
    protected function limite()
    {
        return 3000;

    }
}