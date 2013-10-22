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
class GeolocalizacaoController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Geolocalizacao';
    public $uses = array('Geolocalizacao');

    //public $scaffold;


    function localizarAluno() {


        $alunos = array();
        $cursos = array();
        $render = null;
        $criterios = array();
        $this->loadModel('Curso');

        // Carrega a Lista de Cursos
        $cursos = $this->Curso->find('list', array(
            'fields' => array('Curso.id', 'Curso.nome')
                ));


        if (!empty($this->request->data["curso_id"])) {

            $curso_id = $this->request->data["curso_id"];

            if (!empty($this->request->data["criterios"])) {
                $criterios = $this->request->data["criterios"];

                if (!empty($this->request->data["quantidade"])) {
                    $quantidade = $this->request->data["quantidade"];
                } else {
                    $quantidade = 10;
                }
                
                $this->loadModel("Aluno");
                $alunos = $this->Aluno->getMelhoresAlunos($curso_id, $criterios, $quantidade);
            } else {
                $this->Session->setFlash("Selecione ao menos um critério");
            }
        } else {
            $this->Session->setFlash("Selecione um curso");
        }




        if (!empty($this->request->data["endereco"])) {

            $this->layout = "geolocalizacao";

            // Recebe o endereço principal digitado na tela
            $endereco = $this->request->data["endereco"];

            /*
             * Obtém as coordenadas do endeereco principal
             */
            $endereco = $this->Geolocalizacao->formatarEndereco($endereco);
            $coord_end = $this->Geolocalizacao->getCoordenadas($endereco);

            $this->Geolocalizacao->setItem(array(
                'latitude' => $coord_end['lat'],
                'longitude' => $coord_end['long'],
                'title' => 'nome do icone',
                'icon' => 'empresa',
                'conteudo_html' => 'Aluno tals'
            ));

            if (count($alunos) > 0) {

                foreach ($alunos as $aluno):

                    /*
                     * Obtém as coordenadas do endereco
                     */
                    $endereco_aluno = $this->Geolocalizacao->formatarEndereco(
                            $aluno["notas"]["logradouro"] . "," . $aluno["notas"]["numero"] . "," . $aluno["notas"]["bairro"] . "," . $aluno["notas"]["cidade"] . "," . "Brasil"
                    );

                    $coord_end_aluno = $this->Geolocalizacao->getCoordenadas($endereco_aluno);

                    /*
                     * Monta o Html que será exibido em cada icone
                     */
                    $html = "<h3>{$aluno['notas']['nome']}</h3>";
                    $html .= "Média Geral ".number_format($aluno['notas']['media_geral'], 2)." <br/>";
                    $html .= "Faltas {$aluno['faltas']['total_faltas']} <br/>";

                    $this->Geolocalizacao->setItem(array(
                        'latitude' => $coord_end_aluno['lat'],
                        'longitude' => $coord_end_aluno['long'],
                        'title' => 'nome do icone',
                        'icon' => 'cursando',
                        'conteudo_html' => $html
                    ));
                endforeach;
            }

            $render = $this->Geolocalizacao->render();
        }

        $this->set('cursos', $cursos);
        $this->set('alunos', $alunos);
        $this->set('renderJs', $render);
        $this->set('criterios', $criterios);
    }

}
