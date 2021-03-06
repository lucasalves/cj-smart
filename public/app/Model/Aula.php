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
class Aula extends AppModel {

    public $useTable  = 'aula';
    public $name      = 'Aula';

    public $belongsTo = array(
        'Turma' => array(
            'className' => 'Turma',
            'foreignKey' => 'turma_id'
        ),
        'Materia' => array(
            'className' => 'Materia',
            'foreignKey' => 'materia_id'
        ),
        'Local' => array(
            'className' => 'Local',
            'foreignKey' => 'local_id'
        )
    );
    public $hasMany = array(
        'Ocorrencia' => array(
            'foreignKey' => 'aula_id'
        )
    );
    
    public $virtualFields = array(
        'nome_aula' => "concat((select Materia.nome from materia Materia where Materia.id = Aula.materia_id), ' - ', date_format(Aula.data,'%d/%m/%Y'))"
    );

    public $validate = array(
                'local_id' => array(
                                'validateLocalConflictPeriod' => array(
                                    'rule'    => array('validateLocalConflictPeriod'),
                                    'message' => 'Já existe aula neste local no mesmo dia e período'
                                )
                )
            );

    public function validateLocalConflictPeriod(){ 

        $aulas = $this->find('all', array(
                                        'conditions' => array(
                                                       $this->name . '.data'     => $this->data[$this->name]['data'],
                                                       $this->name . '.local_id' => $this->data[$this->name]['local_id'],
                                                       $this->name . '.id != '   => $this->id
                                                    )
                                    )
                            );

        if(!count($aulas)){
            return true;
        }

        if(count($aulas) == 3){
            return false;
        }

        $currentTurma = $this->Turma->find('all', array(
                                                    'conditions' => array(
                                                                    'Turma.id' => $this->data[$this->name]['turma_id']
                                                                )
                                                    )
                                        );
        $currentTurma = $currentTurma[0];

        foreach ($aulas as $aula) {
            $turma = $this->Turma->find('all', array(
                                                    'conditions' => array(
                                                                    'Turma.id' => $aula[$this->name]['turma_id']
                                                                )
                                                )
                                        );
            $turma = $turma[0];

            if($turma['Turma']['periodo'] ==  $currentTurma['Turma']['periodo']){
                return false;
            }
        }

        return true;
    }
            
    
    public function toEvents($data) {
        $events = array();

        foreach ($data as $event) {
            $events[] = array(
                'id' => $event['Aula']['id'],
                'title' => $event['Turma']['nome'] . " - " . $event['Local']['local'],
                'start' => $event['Aula']['data'],
                'className' => 'period-' . $event['Turma']['periodo']
            );
        }

        return $events;
    }

}
