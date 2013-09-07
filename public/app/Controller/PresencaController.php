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

            if (isset($this->request->data["Presenca"])) {
                // Recebe o array de matriculas selecionadas
                $matriculas = $this->request->data["Presenca"];
            } else {
                $matriculas = array();
            }

            // Adicionada
            $this->Presenca->add($matriculas, $aula_id);


            // Redireciona 
            $this->redirect("/diarioaula/registro/{$turma_id}/{$aula_id}#faltas");
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

        $this->set(array('turmas' => $turmas, 'aulas' => $aulas, 'aula_id' => $aula_id, 'turma_id' => $turma_id));
    }

    public function lista() {

        $turma_id = $this->request->query["turma_id"];
        $aula_id = $this->request->query["aula_id"];

        // Carrega a Lista de Aluno
        $alunos = $this->Presenca->getlistaPresenca($this->request->query["turma_id"], $this->request->query["aula_id"]);

        $this->set(array('alunos' => $alunos, 'turma_id' => $turma_id, 'aula_id' => $aula_id));
    }

    public function carregar_aula() {

        $turma_id = $this->request->query;

        // Carrega a Lista de Aulas
        $aulas = $this->Presenca->Aula->find('list', array(
            'fields' => array('Aula.id', 'Aula.data'), 'conditions' => array('Aula.turma_id' => $turma_id)
                ));

        $this->set(array('aulas' => $aulas));
    }

    public function abonar() {
        $nome = null;
        $nome_pesquisa = null;
        $faltas = array();
        
//        $this->autoRender=false;
        // Realiza o Abono
        if (isset($this->request->query["presenca_id"])) {
            if($this->Presenca->abonarFalta($this->request->query["presenca_id"])){
                $this->Session->setFlash("Falta abonada com sucesso!");
            }
            
        }
        
        
        // Busca o nome
        if (isset($this->request->query["nome"])) {
            
            $nome_pesquisa = $this->request->query["nome"];
            
            // Busca o id da matricula por nome
            $matriculas = $this->Presenca->Matricula->getIdByNome($nome_pesquisa);
            
            if(!empty($matriculas["nome"][0])){
                $nome = $matriculas["nome"][0];
            }else{
                $nome= null;
            }
            
            // Faltas das matriculas
            $faltas = $this->Presenca->find('all',array(
                'conditions' => array(
                    'matricula_id' => $matriculas["matricula_id"],
                    'status' => array(2,3)
                    )
            ));
            
        }
  
        $this->set(array('faltas' => $faltas, 'nome' => $nome,'nome_pesquisa' => $nome_pesquisa));
    }
    
    public function testaFalta(){
        $this->autoRender = false;
        $this->Presenca->verificaAvisoPorFalta(1, 19);
    }
    

}
