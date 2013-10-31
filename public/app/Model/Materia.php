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
class Materia extends AppModel {
    public $useTable = 'materia';

    public $displayField = 'nome';

    public $hasAndBelongsToMany = array(
                                    "Curso" => array( 
                                        "className"  => "Curso"
                                    )
                                );
    
    public  $hasOne = array(
                        'Nota' => array(
                            'foreignKey' => 'materia_id'
                        ),
                        'Educador' => array(
                            'foreignKey' => 'materia_id'
                        ),        
                    ); 

    public function inTurma($id){
        return $this->query('SELECT materia.id as id, materia.nome as nome FROM `turma` INNER JOIN curso ON
curso.id = turma.curso_id INNER JOIN curso_materia ON
curso_materia.curso_id = curso.id RIGHT JOIN materia ON
materia.id = curso_materia.materia_id WHERE turma.id =' . $id);
    }
}
