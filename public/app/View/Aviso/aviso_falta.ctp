<?= $this->Form->create(); ?>
<div>
    <h3>
        Aviso de Faltas
    </h3>


    <div class="row-fluid well">
        <div class='span8'></div>
        <div class='span3'>
            <button class="btn btn-success" >Enviar Aviso de Faltas </button>
        </div>  
    </div>


    <div class="row-fluid">
        <div id="mainRelatorio" >
            <table cellpadding="0" cellspacing="0" class='table table-striped' id='relatorio'>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>Telefone do Responsável</th>
                    <th>Email do Responsável</th>
                    <th>Enviar Aviso</th>
                </tr>   
                <? foreach ($avisos as $aviso): ?>
                    <tr>
                        <td><?= $aviso["Matricula"]["codigo"] ?></td>
                        <td><?= $aviso["Aluno"]["nome"] ?></td>
                        <td><?= $aviso["Aluno"]["responsavel"] ?></td>
                        <td><?= $aviso["Aluno"]["telefone_responsavel"] ?></td>
                        <td><?= $aviso["Aluno"]["email_responsavel"] ?></td>
                        <th>
                            <input type="checkbox" checked name="data[Aviso][id][]" value="<?= $aviso["Aviso"]["id"] ?>" />
                        </th>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>

</div>
<?= $this->Form->end(); ?>
