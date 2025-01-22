<?php
ob_start();
require_once '../classes/Disciplina.php';
?>

<table class="table">
    <tr>
        <th>Nome</th>
        <th>Tempos</th>
        <th>Acções</th>
        </tr>
    <?php
    try {
        $disciplinas = Disciplina::getAll();
        if (!empty($disciplinas)):
            foreach ($disciplinas as $disciplina): ?>
                <tr>
                    <td><?= htmlspecialchars($disciplina->nome) ?></td>
                    <td><?= htmlspecialchars($disciplina->tempos_por_semana) ?></td>
                    <td>
                        <a href="disciplinas_cadastrar.php?id=<?= $disciplina->id?>" class="btn btn-info">Editar</a>
                        
                        <a href="../operacoes/disciplina/excluir.php?id=<?= $disciplina->id ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <tr>
                <td colspan="5">Não há disciplinas cadastradas.</td>
            </tr>
        <?php endif;
    } catch (Exception $e) {
        echo '<tr><td colspan="5">Erro ao buscar as disciplinas: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
    }
    ?>
</table>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteLinks = document.querySelectorAll('a.btn-danger');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const userConfirmed = confirm('Tem certeza que deseja excluir esta disciplina?');
            if (userConfirmed) {
                window.location.href = this.href;
            }
        });
    });
});
</script>
<?php
$conteudo_disciplina = ob_get_clean();
include "disciplinas.php";
?>