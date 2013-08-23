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
            'className'  => 'Materia',
            'foreignKey' => 'materia_id'
        ),
        'Matricula' => array(
            'className'  => 'Matricula',
            'foreignKey' => 'matricula_id'
        )
    );
    
    
    public function getlistaNota($turma_id){
        

        $alunos = $this->Matricula->find('all', array('conditions' => array('Matricula.turma_id' => $turma_id)));
        
//        print_r($this->Matricula->Turma);
        $this->Matricula->Turma->getMeses($turma_id);
        //$meses = $this->find('all', array('conditions' => array('Presenca.aula_id' => $aula_id)));

//        $listaPresenca = array();
//        foreach ($alunos as $aluno):
//
//            $status = null;
//
//            foreach ($ausentes as $ausente):
//
//                if ($ausente["Presenca"]["matricula_id"] == $aluno["Matricula"]["id"]) {
//                    $status = $ausente["Presenca"]["status"];
//                }
//            endforeach;
//
//            $listaPresenca[] = array("codigo" => $aluno["Matricula"]["codigo"],
//                "nome" => $aluno["Aluno"]["nome"],
//                "matricula_id" => $aluno["Matricula"]["id"],
//                "turma_id" => $turma_id,
//                "aula_id" => $aula_id,
//                "status" => $status
//            );
//        endforeach;
//
//        return $listaPresenca;
        
    }
    
}
