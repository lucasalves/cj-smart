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
class Aviso extends AppModel {

    public $useTable = 'aviso';
    public $emailCoordenadora = "brunoipjg@gmail.com";
    
    public $belongsTo = array(
        'Matricula' => array(
            'className' => 'Matricula',
            'foreignKey' => 'matricula_id'
        )
    );
    
    
    public function addAviso($matricula_id, $aula_id) {

        $this->set(array(
            'descricao' => 'Aluno Faltou mais de 1 vez no período de 5 dias',
            'status' => 'Aberto',
            'aula_id' => $aula_id,
            'matricula_id' => $matricula_id,
            'data_cadastro' => date('Ymd')
        ));

        return $this->save();
    }

    public function arquivar($id) {
        $this->set(array(
            'status' => 'Arquivado'
            , 'id' => $id));

        return $this->save();
    }
    
    public function enviar($id) {
        $this->set(array(
            'status' => 'Enviado'
            , 'id' => $id));

        return $this->save();
    }
    
    public function getAvisosAbertos(){
        $avisos = $this->query("
            Select Matricula.codigo
                  ,Matricula.id
                  ,Aluno.nome
                  ,Aluno.responsavel
                  ,Aluno.telefone_responsavel
                  ,Aluno.email_responsavel
                  ,Aviso.id
              from aviso Aviso
                  ,matricula Matricula
                  ,aluno Aluno
             where Aluno.id = Matricula.aluno_id
               and Matricula.id = Aviso.matricula_id
               and Aviso.status = 'Aberto'");
                
        return $avisos;
        
    }

}
