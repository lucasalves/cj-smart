<? if (count($this->viewVars['alunos']) > 0) { ?>
    <div class="row-fluid">
        Esta Turma possui <?= count($this->viewVars['alunos']) ?> alunos
    </div>
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
    <? } ?>
</table>