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
class MateriaController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Materia';
    public $uses = array('Materia');
    public $scaffold;

    public function add_ajax() {
        $this->autoRender = false;
        
        if ($this->request->is('post')) {
            if ($resp = $this->Materia->save($this->request->data)) {
                $resp = array_merge(
                        array('status' => true), $resp
                );
            } else {
                $resp = array_merge(
                        array('status' => false), $this->Materia->validationErrors
                );
            }
        }

        echo json_encode($resp);
    }

    public function get_materia_by_turma($id){
        $this->layout = false;
        $this->set('turmas', $this->Materia->inTurma($id));
    }

}
