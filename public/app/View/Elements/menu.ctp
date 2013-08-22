<div class="row-fluid">
    <div class="span2">
        <div class="sidebar-nav well">
            <ul class='nav nav-list' >
                <li class='nav-header'>Coordenação</li>
                <li><a href="<?php echo Router::url("/educador"); ?>">Educadores</a></li>
                <li><a href="<?php echo Router::url("/curso"); ?>">Cursos</a></li>
                <li><a href="<?php echo Router::url("/turma"); ?>">Turmas</a></li>
                <!--<li><a href="<?php // echo Router::url("/materia"); ?>">Matérias</a></li>-->
                <li class='nav-header'>Administrativo</li>
                <li><a href="<?php echo Router::url("/aluno"); ?>">Alunos</a></li>
                <li><a href="<?php echo Router::url("/matricula"); ?>">Matrículas</a></li>
                <li><a href="<?php echo Router::url("/aula"); ?>">Aulas</a></li>
                <!--<li><a href="<?php echo Router::url("/nota"); ?>">Notas</a></li>-->
                <li><a href="<?php echo Router::url("/diarioaula/"); ?>">Diário de Aula</a></li>
                <li class='nav-header'>Acadêmico</li>

            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span10" id="corpo">
        <?php echo $this->Session->flash(); ?>			
        <?php echo $this->fetch('content'); ?>
    </div>
</div><!--/span-->