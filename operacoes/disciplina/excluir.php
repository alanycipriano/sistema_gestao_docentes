<?php
require_once '../../classes/Disciplina.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    Disciplina::delete($id);
  
} 
header('Location: ../../app/paginas/disciplina.php');
exit();
?>