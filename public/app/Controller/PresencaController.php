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
class PresencaController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Presenca';
    public $uses = array('Presenca');
    public $scaffold;

    public function add() {


        if ($this->request->data) {
            $this->autoRender = false;

            $turma_id = $this->request->data["Turma"]["id"];
            $aula_id = $this->request->data["Presenca"]["aula_id"];

            // Recebe o array de matriculas selecionadas
            $matriculas = $this->request->data["Presenca"]["matricula_id"];

            // Insere as matriculas por vez, marcando a ausencia
            foreach ($matriculas as $id_matricula):
                $this->Presenca->create();
                $this->Presenca->set(
                        array(
                            'status' => 2 // Ausente
                            , 'aula_id' => $aula_id
                            , 'matricula_id' => $id_matricula
                ));

                $this->Presenca->save();
            endforeach;

            // Redireciona 
            $this->redirect("marcar/{$turma_id}/{$aula_id}");
        }
    }

    public function marcar($turma_id = null, $aula_id = null) {
        //$this->autoRender = false;

        // Carrega a Lista de Turmas
        $this->loadModel('Turma');
        $turmas = $this->Turma->find('list', array('fields' => array('Turma.id', 'Turma.nome')
                ));

        // Carrega a Lista de Aulas
        $aulas = $this->Presenca->Aula->find('list', array(
            'fields' => array('Aula.id', 'Aula.data'), 'conditions' => array('Aula.turma_id' => $turma_id)
                ));
        $this->set(array('turmas' => $turmas, 'aulas'=>$aulas , 'aula_id' => $aula_id, 'turma_id'=>$turma_id));
    }

    public function lista() {        
        // Carrega a Lista de Aluno
        $alunos = $this->Presenca->listaPresenca($this->request->query["turma_id"], $this->request->query["aula_id"]);
        
        $this->set(array('alunos' => $alunos));
    }
    
    public function carregar_aula(){
       
        $turma_id = $this->request->query;
        
        // Carrega a Lista de Aulas
        $aulas = $this->Presenca->Aula->find('list', array(
            'fields' => array('Aula.id', 'Aula.data'), 'conditions' => array('Aula.turma_id' => $turma_id)
                ));
        
        $this->set(array('aulas'=> $aulas));
    }
    

}
