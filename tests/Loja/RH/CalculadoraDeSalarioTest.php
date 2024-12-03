<?php

use App\Loja\RH\CalculadoraDeSalario;
use App\Loja\RH\Cargo;
use App\Loja\RH\Funcionario;
use PHPUnit\Framework\TestCase;

class CalculadoraDeSalarioTest extends TestCase
{
    public function testCalculoSalarioDevComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dev =new Funcionario("Andre",1500.0,Cargo::desenvolvedor);

        $salario = $calculadora->calculaSalario($dev);

        $this->assertEquals(1500.0 *0.9,$salario,'',0.00001);

    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre",4000.0,Cargo::desenvolvedor);

        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(4000.0 * 0.8,$salario,0.00001);
    }

    public function testDeveCalcularSalarioParaDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Andre",500.0,Cargo::dba);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(500.0 * 0.85,$salario,0.0001);
        
    }
    public function testDeveCalcularSalarioParaDBAsComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Andre",4500.0,Cargo::dba);

        $salario = $calculadora->calculaSalario($dba);

        $this->assertEquals(4500.0 * 0.75,$salario,0.0001);
        
    }
}