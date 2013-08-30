<?= $this->Html->script(array('presenca.js','ocorrencia.js')); ?>
<div>
    <h3>
        Registro do Diário de Aula
    </h3>
    <div class='row-fluid'>
<!--        <div class='btn-group btn-navba' style='float:right'>
            <?= $this->Html->link(__d('cake', 'Voltar '), array('action' => 'index'), array('class' => 'btn')); ?>
            <input type ='submit' value = 'Salvar' id = 'Inserir' class='btn' />
        </div>-->
    </div>
    <div class="row-fluid">
        <div class="well" >
            <div class='row-fluid'>
                <div class='span3'>
                    <?
                    echo $this->Form->input('Turma.id', array(
                        'label' => 'Turma',
                        'options' => $this->viewVars['turmas'],
                        'multiple' => false,
                        'empty' => 'Selecione a Turma',
                        'selected' => $turma_id
                    ));
                    ?>
                </div>
                <div class='span3'>
                    <?
                    echo $this->Form->input('Presenca.aula_id', array(
                        'label' => 'Aula',
                        'options' => $this->viewVars['aulas'],
                        'multiple' => false,
                        'empty' => 'Selecione a Aula',
                        'selected' => $aula_id
                    ));
                    ?>
                </div>
            </div>

        </div>
    </div>

    <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#presenca" data-toggle="tab">Faltas</a></li>
        <li class=""><a href="#notas" data-toggle="tab">Notas</a></li>
        <li class=""><a href="#ocorrencias" data-toggle="tab">Ocorrências</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="presenca">
            <div id="ListaPresenca"></div>
        </div>
        <div class="tab-pane fade" id="notas">
            <div id="ListaNotas"></div>
        </div>
        <div class="tab-pane fade" id="ocorrencias">
            <div id="ListaOcorrencias"></div>
        </div>
    </div>

    <div class="row-fluid" id="ListaAlunos"> 
    </div>
</div>

<script>
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
} 

//// Change hash for page-reload
//$('.nav-tabs a').on('shown', function (e) {
//    window.location.hash = e.target.hash;
//})
</script>
