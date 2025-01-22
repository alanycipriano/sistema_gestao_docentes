<?php
ob_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once '../classes/Disciplina.php';
    $disciplina = Disciplina::find($id);
}
?>
<div class="student-container">
        <h2>Adicionar Disciplina</h2>
        <form id="student-form" action="../operacoes/disciplina/salvar.php" method="post">
            <input type="hidden" name="id" value="<?=$disciplina->id?? ''?>" id="id">
            <label for="nome">Nome da disciplina</label>
            <input type="text" id="nome" value="<?=$disciplina->nome?? ''?>" name="nome" placeholder="Digite o nome da Disciplina" required class="form-control border border-info mb-1">
            <label for="tempos_por_semana">Tempos por semana</label>
            <input type="number" value="<?=$disciplina->tempos_por_semana?? ''?>" id="tempos_por_semana" name="tempos_por_semana" placeholder="Digite o nº de tempos semanal" class="form-control border border-info mb-1">
            
            <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
<script>
</script>

<?php
$conteudo_disciplina = ob_get_clean();
include "disciplinas.php";
?>