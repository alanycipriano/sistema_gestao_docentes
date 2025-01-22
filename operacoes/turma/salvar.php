<?php
require_once '../../classes/Turma.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? null;
    $classe = $_POST['classe'] ?? null;
    $curso = $_POST['curso'] ?? null;
    $sala = $_POST['sala'] ?? null;
    $ano_lectivo = $_POST['anolectivo'] ?? null;
    $id = $_POST['id'] ?? null;
    
    if ($nome && $classe && $curso && $sala && $ano_lectivo) {
        if($id){
            $turma = Turma::find($id);
        }
        else{
            $turma = new Turma();
        }
        $turma->nome = $nome;
        $turma->classe = $classe;
        $turma->curso = $curso;
        $turma->sala = $sala; 
        $turma->ano_lectivo = $ano_lectivo;
        $turma->save();
        
        echo "<script>window.location.href='../../paginas/turmas_ver.php';</script>";
    } 

}
?>