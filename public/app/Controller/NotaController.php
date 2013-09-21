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
class NotaController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Nota';
    public $uses = array('Nota');
    public $scaffold;

    public function lista() {

//        $this->autoRender = false;
        $turma_id = $this->request->query["turma_id"];
        $aula_id = $this->request->query["aula_id"];

        $materia_id = null;
        if (!empty($this->request->query["materia_id"])) {
            $materia_id = $this->request->query["materia_id"];
        }

        // Carrega a Lista Notas dos Alunos
        $alunos = $this->Nota->getlistaNota($turma_id, $materia_id, $aula_id);

        $this->set(array('alunos' => $alunos, 'turma_id' => $turma_id, 'aula_id' => $aula_id));
    }

    public function add() {


        if ($this->request->data) {
            $this->autoRender = false;

            $turma_id = $this->request->data["Turma"]["id"];
            $aula_id = $this->request->data["Presenca"]["aula_id"];

            $notas = $this->request->data["Nota"];



            foreach ($this->Nota->formatAdd($notas) as $nota):
                $erros = null;
            
            
                $this->Nota->set($nota);

                if ($this->Nota->validates()) {
//                    $this->Nota->add($nota);
                } else {
                    foreach ($this->Nota->invalidFields() as $e) {
                        $erros .= $e[0] . "<br />";
                        break;
                    }
                    $this->Session->setFlash($erros);
                }

            endforeach;

            // Redireciona 
//            $this->redirect("/diarioaula/registro/{$turma_id}/{$aula_id}#notas");
        }
    }

    public function carregar_materia() {
        //$this->autoRender=false;
        $this->loadModel('Aula');
        $aula_id = $this->request->query;

        // Carrega a Lista de Aulas
        $materias = $this->Aula->find('all', array(
            'fields' => array('Materia.id', 'Materia.nome'),
            'conditions' => array('Aula.id' => $aula_id)
                ));


        $this->set(array('materias' => $materias));
    }

    public function boletim() {

//        $this->autoRender=false;
        //$nome = null;
        $mes = '01';
        $ano = '2013';
        $codigo_matricula = '6';

        $matriculas = array();

        $matriculas = $this->Nota->getAlunosBoletim($mes, $ano, $codigo_matricula);

        $this->set('matriculas', $matriculas);
    }

}
