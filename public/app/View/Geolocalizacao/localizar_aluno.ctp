<script type="text/javascript">
<?= $renderJs ?>
</script>
<div class="row-fluid well" style="margin-bottom: 100px">
    <form action="" method="post">
        <?= $this->Form->input("endereco", array('label' => 'Digite o Endereço da Empresa', 'div' => 'span4 required','width'=>'400px')); ?>

        <?
        echo $this->Form->input('curso_id', array(
            'label' => 'Curso',
            'options' => $this->viewVars['cursos'],
            'multiple' => false,
            'empty' => 'Selecione o Curso',
            'div' => 'required span4'
        ));
        ?>

        <div class="span2">
            <input name="data[criterios][]" type="checkbox" value="faltas"/> Menos Faltas<br/>
            <input name="data[criterios][]" type="checkbox" value="notas"/> Melhores Notas<br/>
            <input name="data[criterios][]" type="checkbox" value="ocorrencias"/> Mais Disciplinado          
        </div>
        <div class="span2">
            <br/>
            <input type="submit" value="Localizar" class="btn btn-info"/>
        </div>
        
        <?= $this->Form->end(); ?>
    </form>
</div>


<div id="map_canvas">

</div>

<table class="table table-striped">
    <tr>
        <th>Cód. Matrícula</th>
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
        <td>{$aluno['notas']['media_geral']}</td>
        <td>{$aluno['faltas']['total_faltas']}</td>
        <td>{$aluno['ocorrencias']['total_ocorrencias']}</td>
        <td>{$aluno['notas']['logradouro']}, {$aluno['notas']['numero']},{$aluno['notas']['bairro']}, {$aluno['notas']['cidade']}</td>    
        </tr>
        ";
    endforeach;
    ?>
</table>


