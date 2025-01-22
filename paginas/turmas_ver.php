<?php
ob_start();
require_once '../classes/Turma.php';
?>

<table class="table">
    <tr>
        <th>Nome</th>
        <th>Classe</th>
        <th>Curso</th>
        <th>Sala</th>
        <th>Ano Lectivo</th>
        <th>Accções</th>
    </tr>
    <?php
    try {
        $turmas = Turma::getAll();
        if (!empty($turmas)):
            foreach ($turmas as $turma): ?>
                <tr>
                    <td><?= htmlspecialchars($turma->nome) ?></td>
                    <td><?= htmlspecialchars($turma->classe) ?>ª</td>
                    <td><?= htmlspecialchars($turma->curso) ?></td>
                    <td><?= htmlspecialchars($turma->sala) ?></td>
                    <td><?= htmlspecialchars($turma->ano_lectivo) ?></td>
                    <td>
                        <a href="turmas_cadastrar.php?id=<?= $turma->id?>" class="btn btn-info">Editar</a>
                        
                        <a href="../operacoes/turma/excluir.php?id=<?= $turma->id ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <tr>
                <td colspan="5">Não há turmas cadastradas.</td>
            </tr>
        <?php endif;
    } catch (Exception $e) {
        echo '<tr><td colspan="5">Erro ao buscar as turmas: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
    }
    ?>
</table>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteLinks = document.querySelectorAll('a.btn-danger');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const userConfirmed = confirm('Tem certeza que deseja excluir esta turma?');
            if (userConfirmed) {
                window.location.href = this.href;
            }
        });
    });
});
</script>
<?php
$conteudo_turma = ob_get_clean();
include "turmas.php";
?>