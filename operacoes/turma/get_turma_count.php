<?php
require_once '../../classes/Turma.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classe = $_POST['classe'] ?? '';
    $curso = $_POST['curso'] ?? '';

    if (!empty($classe) && !empty($curso)) {
        // Sanitize input and fetch the count
        $classe = htmlspecialchars($classe, ENT_QUOTES, 'UTF-8');
        $curso = htmlspecialchars($curso, ENT_QUOTES, 'UTF-8');
        $cont = Turma::contaTurmasByCursoEClasse($curso, $classe);
        echo json_encode(['cont' => $cont]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
}
?>
