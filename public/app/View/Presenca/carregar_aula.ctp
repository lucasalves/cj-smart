<?
$options = $this->viewVars["aulas"];
echo $this->element('select_options', array('options'=>$options ,'empty' => 'Selecione a aula') ); ?>