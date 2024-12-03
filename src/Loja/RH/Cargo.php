<?php

namespace App\Loja\RH;

enum Cargo:string {
    case desenvolvedor = 'desenvolvedor';
    case dba = 'dba';
    case testador = 'testador';

    public function getRegra():string{
        return match($this){
            self::desenvolvedor => DezOuVintePorCento::class,
            self::dba,self::testador => QuinzeOuVintePorCento::class,
        };
    }


    public static function getCargos():array
    {
        return [
            self::desenvolvedor->value,
            self::dba->value,
            self::testador->value
        ];
    }
}

