<?php
ob_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once '../classes/Turma.php';
    $turma = Turma::find($id);
}
?>
<form action="../operacoes/turma/salvar.php" class="w-50" method="post">
    <input type="hidden" name="id" value="<?= $turma->id ?? '' ?>">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="" class="form-control border border-info mb-1" readonly value="<?= $turma->nome ?? '' ?>"
    > 
    
    <label for="classe" class="form-label">Classe</label>
    <select name="classe" id="classe" class="form-control border border-info mb-1 select" required>
        <option value="">Seleccione a classe</option>
        <option value="10" <?= isset($turma) && $turma->classe == 10 ? 'selected' : '' ?>>10ª</option>
        <option value="11" <?= isset($turma) && $turma->classe == 11 ? 'selected' : '' ?>>11ª</option>
        <option value="12" <?= isset($turma) && $turma->classe == 12 ? 'selected' : '' ?>>12ª</option>
        <option value="13" <?= isset($turma) && $turma->classe == 13 ? 'selected' : '' ?>>13ª</option>
    </select>
    
    <label for="Curso" class="form-label">Curso</label>
    <select name="curso" id="curso" class="form-control border border-info mb-1 select" required>
        <option value="">Seleccione o curso</option>
        <option value="Enfermagem Geral" <?= isset($turma) && $turma->curso == 'Enfermagem Geral' ? 'selected' : '' ?>>Enfermagem Geral</option>
        <option value="GSI" <?= isset($turma) && $turma->curso == 'GSI' ? 'selected' : '' ?>>GSI</option>
    </select> 
    
    <label for="Sala" class="form-label">Sala</label>
    <select name="sala" id="sala" class="form-control border border-info mb-1 select" required>
        <option value="">Seleccione a sala</option>
        <option value="Sala 1" <?= isset($turma) && $turma->sala == 'Sala 1' ? 'selected' : '' ?>>Sala 1</option>
        <option value="Sala 2" <?= isset($turma) && $turma->sala == 'Sala 2' ? 'selected' : '' ?>>Sala 2</option>
        <option value="Sala 3" <?= isset($turma) && $turma->sala == 'Sala 3' ? 'selected' : '' ?>>Sala 3</option>
        <option value="Sala 4" <?= isset($turma) && $turma->sala == 'Sala 4' ? 'selected' : '' ?>>Sala 4</option>
        <option value="Sala 5" <?= isset($turma) && $turma->sala == 'Sala 5' ? 'selected' : '' ?>>Sala 5</option>
        <option value="Sala 6" <?= isset($turma) && $turma->sala == 'Sala 6' ? 'selected' : '' ?>>Sala 6</option>
        <option value="Sala 7" <?= isset($turma) && $turma->sala == 'Sala 7' ? 'selected' : '' ?>>Sala 7</option>
        <option value="Sala 8" <?= isset($turma) && $turma->sala == 'Sala 8' ? 'selected' : '' ?>>Sala 8</option>
        <option value="Sala 9" <?= isset($turma) && $turma->sala == 'Sala 9' ? 'selected' : '' ?>>Sala 9</option>
        <option value="Sala 10" <?= isset($turma) && $turma->sala == 'Sala 10' ? 'selected' : '' ?>>Sala 10</option>
    </select>    
    
    <label for="Ano lectivo" class="form-label">Ano lectivo</label>
    <select name="anolectivo" id="anolectivo" class="form-control border border-info mb-1 select" required>
        <option value="">Seleccione o ano lectivo</option>
        <option value="2024-2025" <?= isset($turma) && $turma->ano_lectivo == '2024-2025' ? 'selected' : '' ?>>2024-2025</option>
        <option value="2023-2024" <?= isset($turma) && $turma->ano_lectivo == '2023-2024' ? 'selected' : '' ?>>2023-2024</option>
    </select>
    <button type="submit" class="btn btn-info">cadastrar</button>
</form>

<script>
    document.querySelectorAll('.select').forEach(select => {
        select.addEventListener('change', function(){
            let classe = document.querySelector('#classe').value;
            let curso = document.querySelector('#curso').value;
            let sala = document.querySelector('#sala').value;

            fetch("../operacoes/turma/get_turma_count.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `classe=${encodeURIComponent(classe)}&curso=${encodeURIComponent(curso)}`
        })
        .then(response => response.json()) // Assuming the response is in JSON format
        .then(data => {
            var letra = String.fromCharCode(65 + data.cont); 
            document.getElementById("nome").value = `${classe} ª ${letra} ${curso}, ${sala}`;
            console.log(letra); // Log the count
        })
        .catch(error => console.error("Error:", error));
    
        
            
        });
    });
</script>

<?php
$conteudo_turma = ob_get_clean();
include "turmas.php";
?>