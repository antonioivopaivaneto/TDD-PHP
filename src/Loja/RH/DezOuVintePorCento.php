<?php

namespace App\Loja\RH;

class DezOuVintePorCento extends RegraDeCalculo

{
    protected function porcentageBase()
    {
        return 0.9;
    }
    protected function porcentagemAcimaDoLimite()

    {
        return 0.8;
    }
    protected function limite()
    {
        return 3000;

    }
}
