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
class Presenca extends AppModel {

    public $useTable = 'presenca';
    public $belongsTo = array(
        'Matricula' => array(
            'className' => 'Matricula',
            'foreignKey' => 'matricula_id'
        ),
        'Aula' => array(
            'className' => 'Aula',
            'foreignKey' => 'aula_id'
        )
    );

    public function getlistaPresenca($turma_id, $aula_id) {

        $alunos = $this->Matricula->find('all', array('conditions' => array('Matricula.turma_id' => $turma_id)));

        $ausentes = $this->find('all', array('conditions' => array('Presenca.aula_id' => $aula_id)));

        $listaPresenca = array();
        foreach ($alunos as $aluno):

            $status = null;

            foreach ($ausentes as $ausente):

                if ($ausente["Presenca"]["matricula_id"] == $aluno["Matricula"]["id"]) {
                    $status = $ausente["Presenca"]["status"];
                }
            endforeach;

            $listaPresenca[] = array("codigo" => $aluno["Matricula"]["codigo"],
                "nome" => $aluno["Aluno"]["nome"],
                "matricula_id" => $aluno["Matricula"]["id"],
                "turma_id" => $turma_id,
                "aula_id" => $aula_id,
                "status" => $status
            );
        endforeach;

        return $listaPresenca;
    }

    function add($matriculas, $aula_id) {
        
        $this->create();
        $this->delete($aula_id);
        
        // Insere as matriculas por vez, marcando a ausencia
        foreach ($matriculas as $id_matricula):
            $this->create();
            $this->set(
                    array(
                        'status' => 2 // Ausente
                        , 'aula_id' => $aula_id
                        , 'matricula_id' => $id_matricula
            ));

            $this->save();
        endforeach;
    }
    
    function delete($aula_id){
        $this->deleteAll(array('aula_id'=> $aula_id));
    }

}

