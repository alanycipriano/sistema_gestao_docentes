<?php
require_once '../../classes/Turma.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    Turma::delete($id);
  
} 

header('Location: ../../paginas/turmas_ver.php');
exit();
?>