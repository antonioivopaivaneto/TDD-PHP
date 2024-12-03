<?php

namespace App\Exemplos;

use DateTime;

class RelogioDoSistema implements RelogioInterface
{

    public function hoje(){
        return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    }

}