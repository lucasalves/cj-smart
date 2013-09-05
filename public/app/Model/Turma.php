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
class Turma extends AppModel {

    public $useTable = 'turma';
    public $displayField = 'nome';
    public $hasMany = array(
        'Aula' => array(
            'className' => 'Aula',
            'foreignKey' => 'turma_id'
        ),
        'Matricula' => array(
            'className' => 'Matricula',
            'foreignKey' => 'turma_id'
        )
    );
    public $belongsTo = array(
        'Curso' => array(
            'className' => 'Curso',
            'foreignKey' => 'curso_id',
        )
    );
    public $validate = array(
        'nome' => array(
            'rule' => array('minLength', 1),
            'required' => true,
            'message' => 'Nome da Turma é Obrigatória',
        ),
        'periodo' => array(
            'rule' => array('minLength', 1),
            'required' => true,
            'message' => 'Período é obrigatório',
        ),
        'curso_id' => array(
            'rule' => array('minLength', 1),
            'required' => true,
            'message' => 'Curso é obrigatório',
        ),
        'data_criacao' => array(
            'rule' => 'date',
            'required' => true,
            'message' => 'Preencha com uma data válida',
        ),
    );

    public function getMeses($turma_id) {

        $turmas = $this->find('all', array('conditions' => array('Turma.id' => $turma_id)));

        foreach ($turmas as $turma):
            $data_criacao = $turma["Turma"]["data_criacao"];
            $duracao_meses = $turma["Curso"]["duracao"];
        endforeach;


        // called as CakeTime
        App::uses('CakeTime', 'Utility');

        $mes_criacao = CakeTime::format($data_criacao, '%m') - 1;
        $ano_criacao = CakeTime::format($data_criacao, '%Y');

        $meses = array();
        for ($i = 1; $i <= $duracao_meses; $i++) {

            if ($mes_criacao >= 12) {
                $ano_criacao++;
                $mes_criacao = 1;
            } else {
                $mes_criacao++;
            }

            $meses[] = array(
                'data' => CakeTime::format($ano_criacao . "-" . $mes_criacao . "-01", '%Y-%m-%d'),
                'data-formatada' => CakeTime::format($ano_criacao . "-" . $mes_criacao . "-01", '%m/%Y')
            );
        }

        return $meses;
    }

    public function listaAlunos($turma_id) {
        return $this->Matricula('all', array('conditions' => array('Matricula.turma_id' => $turma_id)));
    }

    public function getTurmasAbertas() {

        $turmas = $this->find('all', array(
            'conditions' => array('Turma.data_encerramento' => null),
            'group' => array('Turma.id')
                ));

        if (empty($turmas)) {
            return array();
        } else {
            return $turmas;
        }
    }
    
    public function getTurmasEncerradas() {

        $turmas = $this->find('all', array(
            'conditions' => array('Turma.data_encerramento is not null'),
            'group' => array('Turma.id')
                ));

        if (empty($turmas)) {
            return array();
        } else {
            return $turmas;
        }
    }

    public function encerrarTurma($idTurma) {
        $this->validator()
                ->remove('nome')
                ->remove('periodo')
                ->remove('curso_id')
                ->remove('data_criacao');

        $this->create();
        $this->set(
                array(
                    'id' => $idTurma,
                    'data_encerramento' => date("Ymd"),
        ));

        return $this->save();
    }

}
