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
                'senha' => array(
                    'validationPeriod' => array(
                        'rule' => array('validationPeriodRules'),
                        'message' => 'O aluno já se cadatrou e menos de um neste curso.',
                    ),

                )
            );


    public $hasOne = array(
        'Nota' => array(
            'foreignKey' => 'matricula_id'
        )
    );

    public $hasMany = array(
        'Ocorrencia' => array(
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
            $this->save($this->data);
        }
        return true;
    }

    public function validationPeriodRules($field = array()){
        print_r($data[$this->name]['Turma']['Curso']['id']);
        // $matricula = $this->find(
        //                 'all',
        //                 array(
        //                     'conditions' => array(
        //                                         $this->name . '.aluno_id '   => $data[$this->name]['id'],
        //                                         $this->name . '.Turma.Curso.id' => $data[$this->name]['Turma']['Curso']['id']
        //                                     )
        //                 )
                    // );

        return false;
    }

}
