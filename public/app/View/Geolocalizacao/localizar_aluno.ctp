<?
$check_falta = '';
if (in_array('faltas', $criterios)) {
    $check_falta = "checked";
}
$check_ocorrencias = '';
if (in_array('ocorrencias', $criterios)) {
    $check_ocorrencias = "checked";
}
$check_notas = '';
if (in_array('notas', $criterios)) {
    $check_notas = "checked";
}
?>

<script type="text/javascript">
<?= $renderJs ?>
</script>
<div class="row-fluid well">
    <form action="" method="post">
        <div class="row-fluid">
            <?= $this->Form->input("endereco", array('label' => 'Digite o Endereço da Empresa', 'div' => 'span4', 'style' => 'width:600px',)); ?>
        </div>
        <div class="row-fluid">

            <?
            echo $this->Form->input('curso_id', array(
                'label' => 'Curso',
                'options' => $this->viewVars['cursos'],
                'multiple' => false,
                'empty' => 'Selecione o Curso',
                'div' => 'required span4',
                'required' => true
            ));
            ?>

            <?
//        echo $this->Form->input('quantidade', array(
//            'label' => 'Quantidade',
//            'style' => 'width:50px',
//            'div' => 'span1',
//        ));
            ?>
            <div class="span6 required">
                <label>Critérios</label>
                <input name="data[criterios][]" type="checkbox" value="faltas" <?= $check_falta ?> /> Menos Faltas 
                <input name="data[criterios][]" type="checkbox" value="notas"  <?= $check_notas ?> /> Melhores Notas 
                <input name="data[criterios][]" type="checkbox" value="ocorrencias" <?= $check_ocorrencias ?> /> Mais Disciplinado 
            </div>
            <div class="span2">
                <br/>
                <input type="submit" value="Localizar" class="btn btn-info"/>
            </div>
        </div>


        <?= $this->Form->end(); ?>
    </form>
</div>


<div id="map_canvas">

</div>

<? if (count($alunos) > 0) { ?>
    <table class="table table-striped">
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Média Geral</th>
            <th>Faltas</th>
            <th>Ocorrências</th>
            <th>Endereço</th>
        </tr>
        <?
        foreach ($alunos as $aluno):
            echo "
        <tr>
        <td>{$aluno['notas']['matricula_id']}</td>
        <td>{$aluno['notas']['nome']}</td>
        <td>" . number_format($aluno['notas']['media_geral'], 2) . "</td>
        <td>{$aluno['faltas']['total_faltas']}</td>
        <td>{$aluno['ocorrencias']['total_ocorrencias']}</td>
        <td>{$aluno['notas']['logradouro']}, {$aluno['notas']['numero']},{$aluno['notas']['bairro']}, {$aluno['notas']['cidade']}</td>    
        </tr>
        ";
        endforeach;
        ?>
    </table>
<?
} 

