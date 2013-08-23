<?php echo $this->Form->create(null, array('url' => '/nota/add')); ?>

<input type="hidden"  name='data[Turma][id]' value="<?= $turma_id ?>"  />

<? // if (count($this->viewVars['alunos']) > 0) { ?>
<div class="row-fluid">
    <input type ='submit' value = 'Salvar Notas' id = 'Inserir' class='btn btn-success' style='float:right; margin-bottom: 5px;'/>
</div>
<div class="row-fluid">

    <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th class="data-nota">Junho</th>
            <th class="data-nota">Julho</th>
            <th class="data-nota">Agosto</th>
            <th class="data-nota">Setembro</th>
            <th class="data-nota">Outubro</th>
        </tr>
        
        <?for($i=0; $i<=20; $i++):?>
        <tr>
            <td>0111</td>
            <td>Bruno Leonardo</td>
            <td class="valor-nota"><input type="text" /></td>
            <td class="valor-nota"><input type="text" /></td>
            <td class="valor-nota"><input type="text" /></td>
            <td class="valor-nota"><input type="text" /></td>
            <td class="valor-nota"><input type="text" /></td>
        </tr>
        <?endfor;?>
        <?
//            foreach ($this->viewVars['alunos'] as $aluno):
//
//                echo "<tr>";
//                echo "<td>{$aluno["codigo"]}</td>";
//                echo "<td>{$aluno["nome"]}</td>";
//                echo "</tr>";
//            endforeach;
        ?>
    </table>

</div>

<? // } ?>
<?= $this->Form->end(); ?>