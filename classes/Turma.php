
<?php
require_once "Conexao.php";
class Turma {
    public $id;
    public $nome;
    public $classe;
    public $curso;
    public $sala;
    public $ano_lectivo;
    public function __construct($nome = null, $classe=null, $curso=null, $sala=null,$ano_lectivo=null,$id=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->classe = $classe;
        $this->curso = $curso;
        $this->sala = $sala;
        $this->ano_lectivo = $ano_lectivo;
    }
    // Método para criar a tabela de turmas
    public static function createTable(): void {
        $db = Conexao::getInstance()->getConnection();
        $query = "CREATE TABLE IF NOT EXISTS turmas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            classe INTEGER NOT NULL,
            curso TEXT NOT NULL,
            sala TEXT,
            ano_lectivo TEXT
        )";
        $db->exec($query);
    }

    // Método para salvar (adicionar ou editar) um funcionário
    public function save(): void {
        $db = Conexao::getInstance()->getConnection();

        if ($this->id) {
            // Atualizar um funcionário existente
            $query = "UPDATE turmas SET 
                nome = :nome, 
                classe = :classe, 
                curso = :curso, 
                sala = :sala, 
                ano_lectivo = :ano_lectivo 
                WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $this->id, SQLITE3_INTEGER);
        } else {
            // Adicionar um novo funcionário
            $query = "INSERT INTO turmas (nome, classe, curso, sala, ano_lectivo) 
                      VALUES (:nome, :classe, :curso, :sala, :ano_lectivo)";
            $stmt = $db->prepare($query);
        }

        $stmt->bindValue(':nome', $this->nome, SQLITE3_TEXT);
        $stmt->bindValue(':classe', $this->classe, SQLITE3_TEXT);
        $stmt->bindValue(':curso', $this->curso, SQLITE3_TEXT);
        $stmt->bindValue(':sala', $this->sala, SQLITE3_TEXT);
        $stmt->bindValue(':ano_lectivo', $this->ano_lectivo, SQLITE3_TEXT);

        $stmt->execute();
    }

    // Método para obter todos os turmas
    public static function getAll(): array {
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT * FROM turmas";
        $result = $db->query($query);

        $turmas = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $turma = new Turma($row["nome"],$row["classe"],$row["curso"],$row["sala"],$row["ano_lectivo"],$row["id"]);
            $turmas[] = $turma;
        }
        return $turmas;
    }

    public static function find($id) {
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT * FROM turmas WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $row = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        $turma = null;
        if($row){
            $turma = new Turma($row["nome"],$row["classe"],$row["curso"],$row["sala"],$row["ano_lectivo"],$row["id"]);
        }
        return $turma;
    }

    public static function delete($id): void {
        $db = Conexao::getInstance()->getConnection();
        $query = "DELETE FROM turmas WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $stmt->execute();
    }

    public static function contaTurmasByCursoEClasse($curso,$classe){
        $db = Conexao::getInstance()->getConnection();
        $query = "SELECT COUNT(*) as total FROM turmas WHERE curso = :curso AND classe = :classe";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':curso', $curso, SQLITE3_TEXT);
        $stmt->bindValue(':classe', $classe, SQLITE3_TEXT);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        return $row['total'];
    }
}

    Turma::createTable();

?>
