<?php echo $this->Form->create(null, array('url' => '/presenca/add')); ?>

<input type="hidden"  name='data[Turma][id]' value="<?= $turma_id ?>"  />
<input type="hidden"  name='data[Presenca][aula_id]' value="<?= $aula_id ?>"  />

<? if (count($this->viewVars['alunos']) > 0) { ?>
    <div class="row-fluid">
        <input type ='submit' value = 'Salvar Faltas' id = 'Inserir' class='btn btn-success' style='float:right; margin-bottom: 5px;'/>
    </div>
    <div class="row-fluid">

        <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Faltou?</th>
                <th>Ocorrência</th>
            </tr>
            <?
            foreach ($this->viewVars['alunos'] as $aluno):

                if (!is_null($aluno["status"])) {
                    $checked = "checked";
                } else {
                    $checked = null;
                }

                echo "<tr>";
                echo "<td>{$aluno["codigo"]}</td>";
                echo "<td>{$aluno["nome"]}</td>";
                echo "<td> <input type ='checkbox' name='data[Presenca][matricula_id][]' value = '{$aluno["matricula_id"]}' {$checked} /></td>";
                echo "<td><input type ='button' value = 'Ocorrência' id = 'Ocorrencia' class='btn' /></td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>

    </div>

<? } ?>
<?= $this->Form->end(); ?>