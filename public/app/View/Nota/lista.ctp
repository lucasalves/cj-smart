<?php echo $this->Form->create(null, array('url' => '/nota/add')); ?>

<input type="hidden"  name='data[Turma][id]' value="<?= $turma_id ?>"  />
<input type="hidden"  name='data[Presenca][aula_id]' value="<?= $aula_id ?>"  />

<div class="row-fluid">
    <input type ='submit' value = 'Salvar Notas' id = 'Inserir' class='btn btn-success' style='float:right; margin-bottom: 5px;'/>
</div>
<div class="row-fluid">

    <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <?
            foreach ($this->viewVars['alunos'] as $aluno):
                foreach ($aluno["notas"] as $nota):
                    echo "<th class='data-nota'>{$nota["data-formatada"]}</th>";
                endforeach;
                break;
            endforeach;
            ?>

        </tr>

        <?
        foreach ($this->viewVars['alunos'] as $aluno):
            echo "<tr>";
            echo "<td>{$aluno["codigo"]}</td>";
            echo "<td>{$aluno["nome"]}</td>";
            

            foreach ($aluno["notas"] as $nota):
                echo "<td class='valor-nota'>";
                echo "  <input type='text' name='data[Nota][valor][]' value='{$nota["valor"]}' />";
                echo "  <input type='hidden' name='data[Nota][data][]' value='{$nota["data"]}' />";
                echo "  <input type='hidden' name='data[Nota][materia_id][]' value='{$aluno["materia_id"]}' />";
                echo "  <input type ='hidden' name='data[Nota][matricula_id][]' value='{$aluno["matricula_id"]}' />";
                echo "</td>";
            endforeach;


            echo "</tr>";
        endforeach;
        ?>


    </table>

</div>


<?= $this->Form->end(); ?>