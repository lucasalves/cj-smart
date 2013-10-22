<div class="row-fluid">
    <div class=" main-menu">
        <div class="sidebar-nav well">
            <ul class='nav nav-list' >
                <?php echo $this->Permissions->groupMenu('coordenacao', 'Coordenação'); ?>                
                
                <?php echo $this->Permissions->itemMenu('curso',     'Cursos'); ?>
                <?php echo $this->Permissions->itemMenu('educador',  'Educadores'); ?>
                <?php echo $this->Permissions->itemMenu('turma',     'Turmas'); ?>
                <?php echo $this->Permissions->itemMenu('aula',      'Aulas'); ?>
                <?php echo $this->Permissions->itemMenu('atividade', 'Atividades'); ?>

                <!--<li><a href="<?php // echo Router::url("/materia"); ?>">Matérias</a></li>-->

                <?php echo $this->Permissions->groupMenu('administrativo', 'Administrativo'); ?>

                <?php echo $this->Permissions->itemMenu('matricula',  'Matrículas'); ?>
                <?php echo $this->Permissions->itemMenu('aluno',      'Alunos'); ?>
                <?php echo $this->Permissions->itemMenu('diarioaula', 'Diário de Aula'); ?>
                <?php echo $this->Permissions->itemMenu('presenca',   'Abonar Falta', '/presenca/abonar'); ?>
                <?php echo $this->Permissions->itemMenu('boletim', 'Boletim'); ?>


                <?php echo $this->Permissions->groupMenu('academico', 'Acadêmico'); ?>
                <?php echo $this->Permissions->itemMenu('FinalizarSemestre',   'Finalizar Semestre', '/turma/FinalizarSemestre'); ?>
                <?php echo $this->Permissions->itemMenu('localizarAluno',   'Localizar Aluno', '/geolocalizacao/localizarAluno'); ?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span10" id="corpo">
        <?php echo $this->Session->flash(); ?>			
        <?php echo $this->fetch('content'); ?>
    </div>
</div><!--/span-->