<?php

use App\Exemplos\ConversorDenumeroRomano;
use PHPUnit\Framework\TestCase;

class ConversorDeNumeroRomanoTest extends TestCase{

    public function testDeveEntenderOSimboloI()
    {
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("I");
        $this->assertEquals(1,$numero);
    }

    public function testeDeveEntenderOSiimboloV(){
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("V");
        $this->assertEquals(5,$numero);
    }

    public function testDeveEntenderOSimboloII()
    {
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("XX");
        $this->assertEquals(20,$numero);

    }

    public function testDeveEndenterOSimboloXXII()
    {
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("XXII");
        $this->assertEquals(22,$numero);

    }

    public function testDeveEndenterOSimboloIX()
    {
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("IX");
        $this->assertEquals(9,$numero);

    }
    public function testDeveEndenterOSimboloXXIV()
    {
        $romano = new ConversorDenumeroRomano();
        $numero = $romano->converte("XXIV");
        $this->assertEquals(24,$numero);

    }
}