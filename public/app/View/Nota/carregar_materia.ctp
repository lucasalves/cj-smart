<?
$options = $this->viewVars["materias"];
echo $this->element('select_options', array('options'=>$options ,'empty' => 'Selecione a Matéria') ); ?>