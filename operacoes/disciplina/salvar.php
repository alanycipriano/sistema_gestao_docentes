<?php
require_once '../../classes/Disciplina.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $professores = $_POST['professores'] ?? [];
    $nome = $_POST['nome'] ?? null;
    $tempos_por_semana = $_POST['tempos_por_semana'] ?? null;
    $id = $_POST['id'] ?? null;
    if ($nome && $tempos_por_semana) {
        if($id){
            $disciplina = Disciplina::find($id);
        }
        else{
            $disciplina = new Disciplina();
        }
        $disciplina->nome = $nome;
        $disciplina->tempos_por_semana = $tempos_por_semana;
        $disciplina->save();
    } 
    echo "<script>window.location.href='../../paginas/disciplinas_ver.php';</script>";

}
?>