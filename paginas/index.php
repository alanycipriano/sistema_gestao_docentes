<?php
ob_start();
?>
<h1>Início</h1>


<?php
$conteudo = ob_get_clean();
include "base.php";
?>