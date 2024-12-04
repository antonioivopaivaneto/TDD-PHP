<?php

namespace  App\Loja\Persistencia;

use PDO;
use PDOException;

class ConexaoComBancoDeDados
{


    public function getConexao()
    {
       
            // Caminho para o banco de dados
            $dir = __DIR__ . '/../../../DB'; // Caminho para a pasta DB
            $dbFile = $dir . '/contato.sqlite3'; // Caminho completo para o banco de dados
    
            // Cria o diretório se não existir
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true); // Cria o diretório com permissões adequadas
            }
    
            try {
                // Cria a conexão com o banco de dados SQLite
                $pdo = new PDO("sqlite:$dbFile");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Em caso de erro, exibe a mensagem de erro e termina a execução
                echo "Erro ao conectar: " . $e->getMessage();
                exit;
            }
            
            return $pdo;
        }
    }





