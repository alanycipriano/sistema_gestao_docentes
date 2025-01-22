<?php
ob_start();
?>
<h1>Disciplinas</h1>
<div class="bg-light">
    <a href="disciplinas_ver.php" class="btn btn-light rounded">Ver</a>
    <a href="disciplinas_cadastrar.php" class="btn btn-light rounded">Cadastrar</a>
</div>
    <?=$conteudo_disciplina?? ""?>
<?php
$conteudo = ob_get_clean();
include "base.php";
?>