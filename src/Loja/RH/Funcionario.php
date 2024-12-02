<?php
 namespace App\Loja\RH;

 class Funcionario 
 {
    public readonly string $nome;
    public readonly float $salario;
    public readonly Cargo $cargo;

    public function __construct($nome,$salario,$cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;        
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getSalario()
    {
        return $this->salario;
    }
    public function getCargo()
    {
        return $this->cargo;
    }

 }