<?php

namespace  App\Loja\Persistencia;

use App\Loja\Produto\Produto;
use PDO;

class ProdutoDao
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;

    }

    public function adicionar(Produto $produto)
    {

        $sqlString = "INSERT INTO `produto`";
        $sqlString .="(descricao,valor_unitario,status)";
        $sqlString .="VALUES (?,?,?)";

        $stmt = $this->conexao->prepare($sqlString);

        $stmt->bindParam(1, $produto->getNome());
        $stmt->bindParam(2, $produto->getValor());
        $stmt->bindParam(3, $produto->getStatus());

        $stmt->execute();

        return $this->conexao;

    }

    public function porId($id)
    {
        $sqlString = "SELECT * FROM `produto` WHERE id = ". $id;
        $consulta = $this->conexao->query($sqlString);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function ativos()
    {
        $sqlString = "SELECT * from `produto` WHERE status=1";
        $consulta = $this->conexao->query($sqlString);

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

}


