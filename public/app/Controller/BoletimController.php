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
class BoletimController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Boletim';
    public $uses = array('Boletim');
    public $components = array('RequestHandler');

    public function index() {

//        $this->autoRender=false;
        //$nome = null;
        $mes = null;
        $ano = null;
        $codigo_matricula = null;
        $matriculas = array();
        
        if (!empty($this->request->query)) {
            $mes = $this->request->query["mes"];
            $ano = $this->request->query["ano"];
            $codigo_matricula = $this->request->query["codigo_matricula"];

            $matriculas = $this->Boletim->getAlunosBoletim($mes, $ano, $codigo_matricula);
        }
        
        $this->set('matriculas', $matriculas);
        $this->set('mes', $mes);
        $this->set('ano', $ano);
        $this->set('codigo_matricula',$codigo_matricula);
    }

    public function gerarBoletim($matricula_id) {

//        $this->autoRender = false;

        $this->layout = "";
        $this->loadModel("Nota");


        $notas = $this->Nota->query("
        select *
         from nota Nota
             ,aluno Aluno
             ,matricula Matricula
             ,materia   Materia
             ,turma     Turma
         where Matricula.aluno_id = Aluno.id
           and Nota.matricula_id = Matricula.id
           and Nota.matricula_id = {$matricula_id} 
           and Nota.materia_id = Materia.id
           and Turma.id        = Matricula.turma_id
          order by Nota.materia_id, Nota.data
        ");

        $materias = array();

        for ($i = 0; $i < count($notas); $i++):
            if (!in_array($notas[$i]["Materia"], $materias)) {
                $materias[] = $notas[$i]["Materia"];
            }
        endfor;

        $datas = array();

        for ($i = 0; $i < count($notas); $i++):
            if (!in_array($notas[$i]["Nota"]["data"], $datas)) {
                $datas[] = $notas[$i]["Nota"]["data"];
            }
        endfor;


        $this->set('notas', $notas);
        $this->set('materias', $materias);
        $this->set('datas', $datas);
    }

}
