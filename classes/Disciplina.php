<?php
require_once "Conexao.php";

class Disciplina {
    public $id;
    public $nome;
    public $tempos_por_semana;

    public function __construct($nome = null, $tempos_por_semana = null, $id = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tempos_por_semana = $tempos_por_semana;
    }

    // Método para criar a tabela de disciplinas
    public static function createTable(): void {
        $db = Conexao::getInstance()->getConnection();
        $query = "CREATE TABLE IF NOT EXISTS disciplinas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL UNIQUE,
            tempos_por_semana INTEGER NOT NULL
        )";
        $db->exec($query);
    }
    public static function getTotalDisciplinas(): int {
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT COUNT(*) as total FROM disciplinas"; 
        $result = $db->query($query);
        $row = $result->fetchArray(SQLITE3_ASSOC);
        return $row['total'];
    }

    // Método para salvar (adicionar ou editar) uma disciplina
    public function save(): void {
        $db = Conexao::getInstance()->getConnection();

        if ($this->id) {
            // Atualizar uma disciplina existente
            $query = "UPDATE disciplinas SET 
                nome = :nome, 
                tempos_por_semana = :tempos_por_semana 
                WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $this->id, SQLITE3_INTEGER);
        } else {
            // Adicionar uma nova disciplina
            $query = "INSERT INTO disciplinas (nome, tempos_por_semana) 
                      VALUES (:nome, :tempos_por_semana)";
            $stmt = $db->prepare($query);
            $this->id = $db->lastInsertRowID();
        }

        $stmt->bindValue(':nome', $this->nome, SQLITE3_TEXT);
        $stmt->bindValue(':tempos_por_semana', $this->tempos_por_semana, SQLITE3_INTEGER);

        $stmt->execute();
    }

    // Método para obter todas as disciplinas
    public static function getAll(): array {
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT * FROM disciplinas";
        $result = $db->query($query);

        $disciplinas = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $disciplina = new Disciplina($row["nome"], $row["tempos_por_semana"], $row["id"]);
            $disciplinas[] = $disciplina;
        }
        return $disciplinas;
    }

    // Método para buscar uma disciplina por ID
    public static function find($id) {
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT * FROM disciplinas WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $row = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        $disciplina = null;
        if ($row) {
            $disciplina = new Disciplina($row["nome"], $row["tempos_por_semana"], $row["id"]);
        }
        return $disciplina;
    }

    // Método para excluir uma disciplina
    public static function delete($id): void {
        $db = Conexao::getInstance()->getConnection();
        $query = "DELETE FROM disciplinas WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $stmt->execute();
    }
    
}

// Criar abela de disciplinas
Disciplina::createTable();

?>
