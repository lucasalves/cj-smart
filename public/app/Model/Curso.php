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
class Curso extends AppModel {
    public $useTable = 'curso';
    public $displayField = 'nome';
    

    
    public $hasAndBelongsToMany = array(
                                    "Materia" => array(
                                        "className"  => "Materia",
                                        "joinTable"  => "curso_materia",
                                        "foreignKey" => "curso_id",
                                        "associationForeignKey" => "materia_id"
                                    )
                                );
    public $validate = array(
                'nome' => array(
                       'rule'     => array('minLength', 1),
                       'required' => true,
                       'message'  => 'Nome do Curso é Obrigatório',
                ),
                'descricao' => array(
                    'rule'    => array('minLength', 1),
                    'required' => true,
                    'message'  => 'Descrição do Curso é Obrigatório',
                ),
                'duracao' => array(
                    'rule'    => 'numeric',
                    'required' => true,
                    'message'  => 'Duracão do Curso é Obrigatório',
                )                
    );

}
