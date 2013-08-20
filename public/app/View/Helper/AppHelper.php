<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    public function CampoPlural($nome) {

        $descricoes = array("Educador" => "Educadores",
            "Curso" => "Cursos",
            "Turma" => "Turmas",
            "Materia" => "Matérias",
            "Aluno" => "Alunos",
            "Matricula" => "Matrículas",
            "Aula" => "Aulas"
        );


        if (array_key_exists($nome, $descricoes)) {
            echo $descricoes[$nome];
        } else {
            echo $nome;
        }
    }

    function artigoMasFem($palavra_singular) {

        $palavra_singular = str_replace("r", "", $palavra_singular);
        $palavra_singular = str_replace("s", "", $palavra_singular);

        $tamanho = strlen($palavra_singular) - 1;
        return substr($palavra_singular, $tamanho, 1);
    }

    public function DescricaoCampo($nome) {

        $descricoes = array("nome" => "Nome",
            "periodo" => "Período",
            "data_criacao" => "Data Criação",
            "curso_id" => "Curso",
            "email" => "E-mail",
            "curriculo" => "Currículo",
            "rg" => "RG",
            
            "numero" => "Número",
            "bairro" => "Bairro",
            "cidade" => "Cidade",
            "materia_id" => "Matéria",
            "status" => "Status",
            "descricao" => "Descrição",
            "duracao" => "Duração",
            "codigo" => "Código",
            "cpf" => "CPF",
            "logradouro" => "Logradouro",
            "cep" => "CEP",
            "responsavel" => "Responsável"
        );


        if (array_key_exists($nome, $descricoes)) {
            return $descricoes[$nome];
        } else {
            return $nome;
        }
    }

    public function inRequest($name, $options){
        if(!empty($this->request->query[$name])){
            $options = array_merge(array('value' => $this->request->query[$name]), $options);
        }
        return $options;
    }
    

}
