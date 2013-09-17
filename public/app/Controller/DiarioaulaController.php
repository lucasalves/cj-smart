<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class DiarioaulaController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'DiarioAula';
    public $uses = array();

    //public $scaffold;
    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function index() {
        
    }

    public function registro($turma_id = null, $aula_id = null) {
        //$this->autoRender = false;
        // Carrega a Lista de Turmas
        $this->loadModel('Turma');
        $turmas = $this->Turma->find('list', array('fields' => array('Turma.id', 'Turma.nome')
                ));
        
        $this->loadModel('Presenca');
        // Carrega a Lista de Aulas
        $aulas = $this->Presenca->Aula->find('list', array(
            'fields' => array('Aula.id', 'Aula.data'), 'conditions' => array('Aula.turma_id' => $turma_id)
                ));

        $this->set(array('turmas' => $turmas, 'aulas' => $aulas, 'aula_id' => $aula_id, 'turma_id' => $turma_id));
    }

}
