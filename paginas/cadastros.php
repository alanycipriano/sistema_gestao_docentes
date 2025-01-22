<?php
ob_start();
?>
<h1>Cadastros</h1>
<!-- Início -->
<u>
<li>
    <a href="turmas_ver.php">Turmas</a>

</li>
<li>
    <a href="disciplinas_ver.php">Disciplinas</a>

</li>
<li>
    <a href="/cadastrar-professores">Cadastrar professores</a>
</li>
</u>
 
    
    



<!-- Fim -->
<?php
$conteudo = ob_get_clean();
include "base.php";
?>