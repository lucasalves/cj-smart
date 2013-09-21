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
        $mes = '01';
        $ano = '2013';
        $codigo_matricula = '6';

        $matriculas = array();

        $matriculas = $this->Boletim->getAlunosBoletim($mes, $ano, $codigo_matricula);

        $this->set('matriculas', $matriculas);
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
         where Matricula.aluno_id = Aluno.id
           and Nota.matricula_id = Matricula.id
           and Nota.matricula_id = 6  
           and Nota.materia_id = Materia.id
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
