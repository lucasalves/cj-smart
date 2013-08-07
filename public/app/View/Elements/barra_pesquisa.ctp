<div class="row-fluid">
    <div  class="navbar-form pull-left main_pesquisa">
        <form action="<?php echo Router::url("/" . $controller . '/search'); ?>" method="GET">
            <input type="text" id="valorPesquisa" class="valorPesquisa" name="per" value="<?php echo $valor ?>"/>
            <input type="hidden" name="in" value="<?php echo $controller ?>"/>
            <button class="btn" id="search">Pesquisar  <?php echo Inflector::humanize($controller); ?></button>
            <select id="qtdLinhas" class="control-group">
                <option>20</option>
                <option>50</option>
                <option>100</option>
                <option>200</option>
                <option>500</option>
                <option>1000</option>
            </select> 
            <div class="btn-group">
                <!--a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    + Opções
                    <span class="caret"></span>
                </a-->
                <ul class="dropdown-menu">
                    <!-- dropdown menu links -->
<!--                    <li><a href="#" id="excel"><img src="template/img/excel.png" /> Gerar Excel</a></li>
                    <li><a href="#" id="pdf"><img src="template/img/pdf.png" /> Gerar PDF</a></li>-->
                    <li><a href="#colunasExibir" role="button" data-toggle="modal">Exibir </a></li>
                    <li><a href="#colunasAgrupar" role="button" data-toggle="modal">Agrupar</a></li>
                </ul>
            </div>
            <?php echo $this->Html->link(__d('cake', "Nov{$this->Html->artigoMasFem($pluralHumanName)} %s", $controller), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
        </form>
    </div>
</div>