<?php

use App\Loja\Persistencia\ConexaoComBancoDeDados;
use App\Loja\Persistencia\ProdutoDao;
use App\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoDaoTest extends TestCase
{
    private $conexao;

    protected function setUp(): void
    {
        parent::setUp();

        $this->conexao = (new ConexaoComBancoDeDados())->getConexao();

        $this->conexao->exec("CREATE TABLE IF NOT EXISTS produto (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            preco REAL NOT NULL
        )");

        $this->conexao->exec("DELETE FROM produto");
    }

    protected function criarTabela()
    {
        $sqlString = "
        CREATE TABLE IF NOT EXISTS produto (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            descricao TEXT,
            valor_unitario TEXT,
            status INTEGER
        );
        ";

        $result = $this->conexao->query($sqlString);
        if (!$result) {
            echo "Erro ao criar tabela: " . implode(", ", $this->conexao->errorInfo()) . "\n";
        } else {
            echo "Tabela 'produto' criada com sucesso.\n";
        }
    }

    public function testDeveAdicionarUmProduto2()
    {
        $nome = 'Produto Teste';
        $preco = 19.99;

        $stmt = $this->conexao->prepare("INSERT INTO produto (nome, preco) VALUES (?, ?)");
        $stmt->execute([$nome, $preco]);

        $stmt = $this->conexao->prepare("SELECT id, nome, preco FROM produto WHERE nome = ?");
        $stmt->execute([$nome]);

        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotFalse($produto, 'Produto não encontrado no banco de dados');
        $this->assertEquals($nome, $produto['nome'], 'Nome do produto não corresponde');
        $this->assertEquals($preco, $produto['preco'], 'Preço do produto não corresponde');
    }



    public function testDeveAdicionarUmProduto()
    {
        $stmt = $this->conexao->prepare("INSERT INTO produto (nome, preco) VALUES (?, ?)");
        $stmt->execute(['Produto Teste', 19.99]);

        $stmt = $this->conexao->query("SELECT COUNT(*) FROM produto");
        $count = $stmt->fetchColumn();

        $this->assertEquals(1, $count);
    }






    public function tearDown(): void
    {
        
        $this->conexao = null;

      
        $filePath = __DIR__ . '/../../../DB';
        if (file_exists($filePath . "/test.db")) {
            unlink($filePath . "/test.db"); 

        parent::tearDown();
    }
}
}
