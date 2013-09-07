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
class Presenca extends AppModel {

    public $useTable = 'presenca';
    public $belongsTo = array(
        'Matricula' => array(
            'className' => 'Matricula',
            'foreignKey' => 'matricula_id'
        ),
        'Aula' => array(
            'className' => 'Aula',
            'foreignKey' => 'aula_id'
        ),
        'Aviso' => array(
            'className' => 'Aviso',
            'foreignKey' => 'aviso_id'
        )
    );

    public function getlistaPresenca($turma_id, $aula_id) {

        $listaPresenca = array();
        if ($aula_id != "") {
            $alunos = $this->Matricula->find('all', array('conditions' => array('Matricula.turma_id' => $turma_id)));

            $ausentes = $this->find('all', array('conditions' => array('Presenca.aula_id' => $aula_id)));


            foreach ($alunos as $aluno):

                $status = null;
                $presenca_id = null;
                foreach ($ausentes as $ausente):



                    if ($ausente["Presenca"]["matricula_id"] == $aluno["Matricula"]["id"]) {
                        $status = $ausente["Presenca"]["status"];
                        $presenca_id = $ausente["Presenca"]["id"];
                    }
                endforeach;

                $listaPresenca[] = array("codigo" => $aluno["Matricula"]["codigo"],
                    "nome" => $aluno["Aluno"]["nome"],
                    "matricula_id" => $aluno["Matricula"]["id"],
                    "turma_id" => $turma_id,
                    "aula_id" => $aula_id,
                    "status" => $status,
                    "presenca_id" => $presenca_id
                );
            endforeach;
        }
        return $listaPresenca;
    }

    function add($dados, $aula_id) {

        $this->create();

        $contador = 0;

        foreach ($dados["matricula_id"] as $id_matricula):

            if (isset($dados["status"][$contador])) {
                $status = 2;
            } else {
                $status = 1;
            }

            $this->create();
            $this->set(
                    array(
                        'status' => $status // Ausente
                        , 'aula_id' => $aula_id
                        , 'matricula_id' => $id_matricula
                        , 'id' => $dados["id"][$contador]
            ));

            $this->save();
            $this->create();
            $this->verificaAvisoPorFalta($id_matricula,$aula_id);
            $contador++;
        endforeach;
    }

    public function abonarFalta($presenca_id) {
        $this->set(array(
            'status' => 3, 'id' => $presenca_id
        ));

        return $this->save();
    }

    public function verificaAvisoPorFalta($matricula_id, $aula_id) {
              
        // Quantidade de dias verificar
        $conf_dias = 5;
        // Quantidade de dias permitido faltar dentro dos dias verificados
        $conf_faltas_permitidas =1;
        
        // Busca a data da Falta
        $aula = $this->Aula->findAllById($aula_id);
        
        $data_falta = $aula[0]["Aula"]["data"];
        
        $data_inicial = date('Y-m-d', strtotime("-{$conf_dias} days", (strtotime($data_falta))));
        $data_final = $data_falta;


        $faltas = $this->find('all', array(
            'fields' => array('Aula.data', 'Presenca.id'),
            'conditions' => array(
                'Presenca.aviso_id' => null,
                'Presenca.matricula_id' => $matricula_id,
                'Presenca.status' => 'Ausente',
                'Aula.data BETWEEN ? AND ?' => array( $data_inicial, $data_final),
                
            ),
            'order' => 'Aula.data ASC'
                ));
        
        
        // Total de Faltas encontradas no periodo de 5 dias
        $total_faltas = count($faltas);

        
        // Gera ocorrencia e marca as faltas como consultadas
        if($total_faltas > $conf_faltas_permitidas){           
           
            $aviso = $this->Aviso->addAviso($matricula_id, $aula_id);
            
            foreach($faltas as $falta):
                $this->set(array(
                    'aviso_id' => $aviso["Aviso"]["id"],
                    'id' => $falta["Presenca"]["id"]
                ));
                
                $this->save();
            endforeach;
        }
    }

}

