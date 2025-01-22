<?php
ob_start();
?>
<h1>Turmas</h1>
<div class="bg-light">
    <a href="turmas_ver.php" class="btn btn-light rounded">Ver</a>
    <a href="turmas_cadastrar.php" class="btn btn-light rounded">Cadastrar</a>
</div>
    <?=$conteudo_turma?? ""?>
<?php
$conteudo = ob_get_clean();
include "base.php";
?>