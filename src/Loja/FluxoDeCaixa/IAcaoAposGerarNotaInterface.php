<?php

namespace  App\Loja\FluxoDeCaixa;

interface IAcaoAposGerarNotaInterface
{
    public function executa(NotaFiscal $nf);

}