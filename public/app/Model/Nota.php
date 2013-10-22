<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Nota extends AppModel {

    public $useTable = 'nota';
    public $belongsTo = array(
        'Materia' => array(
            'className' => 'Materia',
            'foreignKey' => 'materia_id'
        ),
        'Matricula' => array(
            'className' => 'Matricula',
            'foreignKey' => 'matricula_id'
        )
    );
    public $validate = array(
        'valor' => array(
            'between' => array(
                'rule' => array('validationNotaRules'),
                'message' => 'Insira um valor entre 0 e 10'
            )
        )
    );

//    
//    public $validate = array(
//        'valor' => array(
//            'rule' => array('minLength', 1),
//            'required' => true,
//            'message' => 'Valor não pode ser vazio',
//        )
//    );



    public function getlistaNota($turma_id, $materia_id = null, $aula_id = null) {


        if (is_null($materia_id)) {
            $materia_id = $this->getMateriaId($aula_id);
        }
        
        
           

        // Carrega a Lista Notas dos Alunos
        $meses = $this->Matricula->Turma->getMeses($turma_id);

        $alunos = $this->Matricula->find('all', array(
            'fields' => array('Matricula.id', 'Aluno.nome', 'Matricula.codigo'),
            'conditions' => array('Matricula.turma_id' => $turma_id),
            'group' => 'Matricula.id'
                )
        );

        $notas = $this->find('all', array(
            'fields' => array('Nota.data', 'Nota.valor', 'Matricula.id', 'Nota.id'),
            'conditions' => array('Matricula.turma_id' => $turma_id, 'Nota.materia_id' => $materia_id),
                )
        );

        App::uses('CakeTime', 'Utility');

        foreach ($alunos as $aluno):

            // Zero o array
            $notas_meses = null;

            foreach ($meses as $mes):

                // Zero o valor
                $valor = 0;
                $id = null;
                foreach ($notas as $nota):
                    if ($nota["Nota"]["data"] == $mes['data'] and $aluno["Matricula"]["id"] == $nota["Matricula"]["id"]) {
                        $valor = $nota["Nota"]["valor"];
                       $id = $nota["Nota"]["id"];
                    }
                endforeach;

                $notas_meses[] = array('data' => $mes['data'], 'data-formatada' => $mes['data-formatada'], 'valor' => $valor, 'nota_id'=>$id);

            endforeach;

            $listaNota[] = array(
                "codigo" => $aluno["Matricula"]["codigo"],
                "nome" => $aluno["Aluno"]["nome"],
                "matricula_id" => $aluno["Matricula"]["id"],
                "turma_id" => $turma_id,
                "materia_id" => $materia_id,
                "notas" => $notas_meses
            );

        endforeach;

        return $listaNota;
    }

    function formatAdd($notas) {
        

        
        // Insere as notas
        for ($i = 0; $i < count($notas["valor"]); $i++):

            $valor = $notas["valor"][$i];
            $data = $notas["data"][$i];
            
            
            if ($valor != "") {
                
                if(isset($notas["id"][$i]) ){
                    $id = $notas["id"][$i];
                }else{
                    $id = null;
                }
                
                $dados[] = array(
                    'valor' => $valor // Ausente
                    , 'matricula_id' => $notas["matricula_id"][$i]
                    , 'materia_id' => $notas["materia_id"][$i]
                    , 'data' => $data
                    ,'id' => $id
                );
                
            }
        endfor;
        
        return $dados;
    }
    
    function add($dados){
        $this->create();
        $this->set($dados);
        $this->save();
    }

    public function getMateriaId($aula_id) {


        $aula_materia = $this->query("
            select *
              from aula Aula
                  ,materia Materia
             where Materia.id = Aula.materia_id
               and Aula.id = {$aula_id}
            ");
        
        foreach ($aula_materia as $materia):
            return $materia["Materia"]["id"];
        endforeach;
    }

    public function validationNotaRules() {

        $valor = $this->data[$this->name]['valor'];
        if ($valor < 0 or $valor > 10) {
            return false;
        } else {
            return true;
        }
    }

}
