<?php

class Conexao {
    private static ?Conexao $instance = null; // Instância única
    private ?SQLite3 $connection = null;      // Conexão SQLite3
    private static string $database = __DIR__.'/gestao_docentes.db'; // Nome do banco de dados estático

    // Construtor privado para evitar instâncias externas
    private function __construct() {
        $this->conectar(); // Conecta automaticamente ao banco ao instanciar
    }

    // Método para obter a única instância da classe
    public static function getInstance(): Conexao {
        if (self::$instance === null) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    // Método para estabelecer a conexão com o banco de dados
    private function conectar(): void {
        if ($this->connection === null) {
            try {
                $this->connection = new SQLite3(self::$database);
            } catch (Exception $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
    }

    // Método para obter a conexão ativa
    public function getConnection(): ?SQLite3 {
        if ($this->connection === null) {
            throw new Exception("Conexão ainda não foi estabelecida.");
        }
        return $this->connection;
    }

    // Método para impedir clonagem
    private function __clone() { }

    // Método para impedir a desserialização
    public function __wakeup() { }
}

?>
