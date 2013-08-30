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
class Matricula extends AppModel {

    public $useTable = 'matricula';
    
    public $name = 'Matricula';

    public $validate = array(
                'turma_id' => array(                    
                    'turma_selected' => array(   
                                    'rule'    => 'numeric',                                 
                                    'required'   => true,
                                    'allowEmpty' => false,
                                    'message'    => 'Selecione uma turma'
                                )

                ),
                'aluno_id' => array(
                    'aluno_selected' => array(
                        'rule'    => 'numeric',                                 
                        'required'   => true,
                        'allowEmpty' => false,
                        'message'    => 'Adicione um aluno para matricular'
                    ),
                    'validationPeriod' => array(
                        'rule' => array('validationPeriodRules'),
                        'message' => 'O aluno já se cadastrou em menos de um ano neste curso.',
                    ),
                )
            );


    public $hasMany = array(
        'Ocorrencia' => array(
            'foreignKey' => 'matricula_id'
        ),
        'Nota' => array(
            'foreignKey' => 'matricula_id'
        )
    );
    public $belongsTo = array(
        'Aluno',
        'Turma'
    );

    public function afterSave($options){       
        if(empty($this->data['Matricula']['codigo'])){
            $this->data['Matricula']['codigo'] = $this->data['Matricula']['id'];           
            $this->save($this->data, false);
        }

        return true;
    }

    public function validationPeriodRules($field = array()){
        $matriculas = $this->find(
                        'all',
                        array(
                            'conditions' => array(
                                                $this->name . '.aluno_id '   => $this->data[$this->name]['aluno_id']
                                            )
                        )
                    );
        
        $curso = $this->Turma->find(
                                'all',
                                array(
                                    'conditions' => array(
                                                       'Turma.id' => $this->data[$this->name]['turma_id']
                                                    )
                                )
                            );
        $curso = $curso[0];
        
        foreach($matriculas as $matricula){
            if($matricula['Turma']['curso_id'] === $curso['Curso']['id']){
                if(!strtotime($curso['Turma']['data_criacao']) + 31556926 < strtotime($this->data[$this->name]['data'])){
                    return false;
                }
            }
        }

        return true;
    }

}
