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
class Boletim extends AppModel {


    var $useTable = false;
    
    
    public function getAlunosBoletim($mes, $ano, $codigo_matricula){
        
        $sql = "
        select Aluno.nome
             , Turma.nome
             , Matricula.codigo
             , Matricula.id
          from Turma Turma
              ,Matricula Matricula
              ,Aluno Aluno
         where Matricula.turma_id = Turma.id
           and Matricula.aluno_id = Aluno.id
           and {$ano}{$mes} >= date_format(Turma.data_criacao, '%Y%m') 
           and ( {$ano}{$mes} <= date_format(Turma.data_encerramento, '%Y%m') or Turma.data_encerramento is null)
           and (Matricula.codigo = '{$codigo_matricula}')";
           
        return $this->query($sql);
    }
    
    public function getBoletim($matricula_id) {
        
        
        $notas = $this->find('all', array(
            'fields' => array('Nota.data', 'Nota.valor', 'Matricula.id'),
            'conditions' => array('Matricula.id' => $matricula_id),
                )
        );

    }

}
