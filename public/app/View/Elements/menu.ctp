<div class="row-fluid">
    <div class=" main-menu">
        <div class="sidebar-nav well">
            <ul class='nav nav-list' >
                <?php echo $this->Permissions->groupMenu('coordenacao', 'Coordenação'); ?>                
                
                <?php echo $this->Permissions->itemMenu('curso',    'Cursos'); ?>
                <?php echo $this->Permissions->itemMenu('educador', 'Educadores'); ?>
                <?php echo $this->Permissions->itemMenu('turma',    'Turmas'); ?>
                <?php echo $this->Permissions->itemMenu('aula',     'Aulas'); ?>

                <!--<li><a href="<?php // echo Router::url("/materia"); ?>">Matérias</a></li>-->
<<<<<<< HEAD
                <li class='nav-header'>Administrativo</li>
                <li><a href="<?php echo Router::url("/matricula"); ?>">Matrículas</a></li>
                <li><a href="<?php echo Router::url("/aluno"); ?>">Alunos</a></li>
                <li><a href="<?php echo Router::url("/diarioaula/"); ?>">Diário de Aula</a></li>
                <li><a href="<?php echo Router::url("/presenca/abonar"); ?>">Abonar Falta</a></li>
                <li><a href="<?php echo Router::url("/boletim"); ?>">Boletins</a></li>
                <li class='nav-header'>Acadêmico</li>
                <li><a href="<?php echo Router::url("/turma/FinalizarSemestre"); ?>">Finalizar Semestre</a></li>
=======
                <?php echo $this->Permissions->groupMenu('administrativo', 'Administrativo'); ?>

                <?php echo $this->Permissions->itemMenu('matricula',  'Matrículas'); ?>
                <?php echo $this->Permissions->itemMenu('aluno',      'Alunos'); ?>
                <?php echo $this->Permissions->itemMenu('diarioaula', 'Diário de Aula'); ?>
                <?php echo $this->Permissions->itemMenu('presenca',   'Abonar Falta', '/presenca/abonar'); ?>


                <?php echo $this->Permissions->groupMenu('academico', 'Acadêmico'); ?>

                <?php echo $this->Permissions->itemMenu('FinalizarSemestre',   'Finalizar Semestre', '/turma/FinalizarSemestre'); ?>
>>>>>>> 798d149c69f1b6e398428ec5707632963451cf9b
            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span10" id="corpo">
        <?php echo $this->Session->flash(); ?>			
        <?php echo $this->fetch('content'); ?>
    </div>
</div><!--/span-->