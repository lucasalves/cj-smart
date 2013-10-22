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
class Aluno extends AppModel {

    public $useTable = 'aluno';
    public $displayField = 'nome';
    public $hasMany = array(
        'Matricula' => array(
            'foreignKey' => 'aluno_id'
        )
    );
    public $validate = array(
        'telefone' => array(
            'rule' => 'numeric',
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Digite um numero de telefone valido'
        ),
        'data_nascimento' => 'date',
        'rg' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create'
            )
        ),
        ''
    );

    public function viewOrAdd($where) {
        $aluno = $this->find('all', array(
            'conditions' => $where
                )
        );

        if (!empty($aluno)) {
            return 'view/' . $aluno[0]['Aluno']['id'];
        } else {
            $url = 'add?';

            foreach ($where as $key => $value) {
                $url .= $key . '=' . $value;
            }

            return $url;
        }
    }

    public function insereAlunosImportacao($dados) {

        for ($i = 1; $i < count($dados); $i = $i + 1000):

            $linha = explode(";", $dados[$i]);

            $nomecompleto = $linha[0];

            $nomeQuebrado = explode(" ", $linha[0]);

            $rg_parte_1 = str_pad(rand(1, 50), 2, STR_PAD_LEFT);
            $rg_parte_2 = str_pad(rand(1, 999), 3, STR_PAD_LEFT);
            $rg_parte_3 = str_pad(rand(1, 999), 3, STR_PAD_LEFT);
            $rg_parte_4 = rand(1, 9);
            $cep = str_pad(rand(1, 99999), 5, STR_PAD_LEFT);
            $numero_casa = rand(1, 2000);

            $telefone = rand(1, 99999999);

            $aluno = array(
                'nome' => $linha[0],
                'telefone' => $telefone,
                'data_nascimento' => '19910528',
                'responsavel' => $nomeQuebrado[1] . " " . $nomeQuebrado[0],
                'telefone_responsavel' => $telefone,
                'email_responsavel' => strtolower('brunoipjg@gmail.com'),
                'rg' => "{$rg_parte_1}.{$rg_parte_2}.{$rg_parte_3}-{$rg_parte_4}",
                'cep' => $cep . '-000',
                'logradouro' => 'Rua Dos ' . $linha[0] . 's',
                'numero' => $numero_casa,
                'bairro' => 'Aclimação',
                'cidade' => 'São Paulo',
                'email' => strtolower($nomeQuebrado[0] . "." . $nomeQuebrado[1] . '@gmail.com')
            );

            $this->create();
            $this->set($aluno);
            $this->save();
        endfor;
    }

    public function insereMatriculasImportacao() {

        $alunos = $this->find('all');

        $turmas = $this->Matricula->Turma->find('all');

        $quantidadeAlunos = count($alunos);
        $quantidadeTurmas = count($turmas);

        $alunoPorTurma = round($quantidadeAlunos / $quantidadeTurmas);
        $contaTurma = 0;
        $contaAluno = 0;
        $contador = 1;
        foreach ($alunos as $x):

            if (isset($turmas[$contaTurma]["Turma"]["id"])) {
                $turma_id = $turmas[$contaTurma]["Turma"]["id"];
                $aluno_id = $x["Aluno"]["id"];

                $this->Matricula->create();

                $this->Matricula->set(array(
                    'turma_id' => $turma_id,
                    'aluno_id' => $aluno_id,
                    'codigo' => $contador,
                    'data' => $turmas[$contaTurma]["Turma"]["data_criacao"]
                ));

                $this->Matricula->save();

                if ($contaAluno == $alunoPorTurma) {
                    $contaTurma++;
                    $contaAluno = 0;
                }
            }
            $contador++;
            $contaAluno++;
        endforeach;
    }

    public function statisticsNotes($user){
        $user = $this->find('all', array('conditions' => array('Aluno.id' => $user)));
        $user = $user[0];        
        
        return array('matriculas' => $this->averageRegistry($user['Matricula']), 'materias' => $this->getNotesBySubject($user['Matricula']));
    }

    public function averageRegistry($matriculas){
        $averages = array();
        foreach($matriculas as $matricula){
            $averages[] = $this->Matricula->getNotesByRegistry($matricula['id']);
        }

        return $averages;
    }

    public function getNotesBySubject($matriculas){
        return $this->Matricula->getNotesBySubject($matriculas);
    }

    public function getMelhoresAlunos($curso_id, $criterios, $quantidade) {
        
        $sql = "
SELECT *
  FROM matricula Matricula
       RIGHT JOIN (-- Faltas
                   SELECT resumo_faltas.matricula_id,
                          sum(resumo_faltas.quantidade) total_faltas
                     FROM (SELECT Presenca.matricula_id,
                                  CASE
                                     WHEN Presenca.status = 'Ausente' THEN 1
                                     ELSE 0
                                  END
                                     quantidade
                             FROM presenca Presenca) resumo_faltas
                   GROUP BY resumo_faltas.matricula_id) faltas
          ON faltas.matricula_id = Matricula.id
       RIGHT JOIN (-- Ocorrencias
                   SELECT resumo_ocorrencias.matricula_id,
                          sum(resumo_ocorrencias.quantidade)
                             total_ocorrencias
                     FROM (SELECT count(1) quantidade,
                                  Ocorrencia.matricula_id
                             FROM ocorrencia Ocorrencia) resumo_ocorrencias
                   GROUP BY resumo_ocorrencias.matricula_id) ocorrencias
          ON ocorrencias.matricula_id = Matricula.id
       RIGHT JOIN (-- Notas
                   SELECT   (  sum(valor)
                             / (SELECT count(1)
                                  FROM curso_materia CursoMateria
                                 WHERE CursoMateria.curso_id = Curso.id))
                          / 6
                             media_geral,
                          Nota.materia_id,
                          Matricula.id matricula_id,
                          Aluno.nome,
                          Aluno.logradouro,
                          Aluno.numero,
                          Aluno.bairro,
                          Aluno.cidade
                     FROM nota Nota,
                          matricula Matricula,
                          aluno Aluno,
                          curso Curso,
                          turma Turma
                    WHERE     Nota.matricula_id = Matricula.id
                          AND Aluno.id = Matricula.id
                          AND Curso.id = Turma.curso_id
                          AND Turma.id = Matricula.turma_id
                          AND Curso.id = {$curso_id}
                   GROUP BY Matricula.id) notas
          ON notas.matricula_id = Matricula.id
          

-- 
order by ";
      
       $order_by = null;
       
       if(in_array('notas', $criterios)){
           if(!is_null($order_by)){
               $order_by .= ",";
           }
           $order_by .=" media_geral desc";
       }
       
       
       if(in_array('faltas', $criterios)){
           
           if(!is_null($order_by)){
               $order_by .= ",";
           }
           $order_by .=" total_faltas asc";
       }
       

       if(in_array('ocorrencias', $criterios)){
           if(!is_null($order_by)){
               $order_by .= ",";
           }
           $order_by .=" total_ocorrencias asc";
       }
       
       $sql.= $order_by . " limit " . $quantidade;
       
    
        
        return $this->query($sql);
    }

}
