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
class TurmaController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
    public $name = 'Turma';
    public $uses = array('Turma');

    public $scaffold;
    
    public function finalizarSemestre() {
//        $this->autoRender=false;

        $this->loadModel('Turma');


        // Turmas do Curso
        $turmas_abertas = $this->Turma->getTurmasAbertas();
        $turmas_encerradas = $this->Turma->getTurmasEncerradas();

        $this->set(array('turmas_abertas' => $turmas_abertas, 'turmas_encerradas' => $turmas_encerradas));
    }

    public function finalizar() {
        
        if ($this->request->query["turma_id"]) {
            
            $turma_id = $this->request->query["turma_id"];
            
            $this->loadModel('Turma');
            if($this->Turma->encerrarTurma($turma_id)){
                $this->Session->setFlash("Semestre Finalizado com Sucesso. Por Favor aguarde o término da impressão dos certificados");
            };
        }
     
    }
}
