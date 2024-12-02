<?php

namespace App\Loja\RH;

enum Cargo:string {
    case Desenvolvedor = 'Desenvolvedor';
    case DBA = 'DBA';
    case TI = 'TI';


    public static function getCargos():array
    {
        return [
            self::Desenvolvedor->value,
            self::DBA->value,
            self::TI->value
        ];
    }
}

