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
class AvisoController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Aviso';
    public $uses = array('Aviso');
    public $scaffold;
    var $components = array('Email');

    public function enviarEmailResponsavel($dados = array()) {



        $name = "CJ Smart";
        $from = "brunoipjg@hotmail.com";
        $subject = "Aviso de Falta - {$dados["aluno"]} ";
        $msg = "O Filho(a) faltou duas vezez consecutivas dentro de uma semana.\n\n Por favor entrar em contato conosco.\n\n Obrigado.";

        $this->Email->sendAs = 'both'; // html, text, both
        $this->set('conteudo', $msg); // especifica variavel da mensagem para o template
        $this->Email->layout = 'contact'; // views/elements/email/html/contact.ctp
//        $this->Email->template = 'contact';
        // set view variables as normal
        $this->set('from', $name);
        $this->set('msg', $msg);

        $this->Email->to = $dados['to'];
        $this->Email->subject = $subject;
        $this->Email->replyTo = "brunoipjg@gmail.com";
        $this->Email->from = $name . '<' . $from . '>';
        $this->Email->cc = $this->Aviso->emailCoordenadora;

        if ($this->Email->send($msg)) {
            $this->Aviso->enviar($dados["aviso_id"]);
            $this->Session->setFlash("Mensagem(s) Enviada(s) com sucesso!");
        } else {
            $this->Session->setFlash("Mensagem(s) NÃO Enviada(s)!");
        }
    }

    public function enviarEmailCoordenadora($dados = array()) {



        $name = "CJ Smart";
        $from = "brunoipjg@hotmail.com";
        $subject = "Relação de Responsáveis sem contato";

        $msg = " <table>
                 <tr>
                       <td>Matrícula</td>
                       <td>Nome</td>
                       <td>Responsável</td>
                       <td>Contato</td>
                </tr>";

        foreach ($dados["alunos"] as $aluno):
            $msg .= "<tr>
                       <td>{$aluno["Matricula"]["codigo"]}</td>
                       <td>{$aluno["Matricula"]["nome"]}</td>
                       <td>{$aluno["Matricula"]["responsavel"]}</td>
                       <td>{$aluno["Matricula"]["telefone_responsavel"]}</td>
                </tr>";
        endforeach;

        $msg .= "</table>";


        $this->Email->sendAs = 'both'; // html, text, both
        $this->set('conteudo', $msg); // especifica variavel da mensagem para o template
        $this->Email->layout;//= 'contact'; // views/elements/email/html/contact.ctp
//        $this->Email->template = 'padrao';
        // set view variables as normal
        $this->set('from', $name);
        $this->set('msg', $msg);

        $this->Email->to = $this->Aviso->emailCoordenadora;
        $this->Email->subject = $subject;
        $this->Email->replyTo = "brunoipjg@gmail.com";
        $this->Email->from = $name . '<' . $from . '>';

        if ($this->Email->send($msg)) {
            $this->Session->setFlash("Mensagem(s) Enviada(s) com sucesso!");
        } else {
            $this->Session->setFlash("Mensagem(s) NÃO Enviada(s)!");
        }
    }

    public function avisoFalta() {


        if (!empty($this->request->data)) {

//            $this->autoRender = false;

            $this->Aviso->emailCoordenadora;

            $responsaveis_sem_email = array();
            $alunos_enviados = array();

            // Busca os Alunos
            $this->loadModel("Matricula");

            $matriculas = $this->Aviso->find('all', array(
                'conditions' => array('Aviso.id' => $this->request->data["Aviso"]["id"])
                    ));
        
            foreach ($matriculas as $matricula):
                if ($matricula["Matricula"]["email_responsavel"] == "") {
                    $responsaveis_sem_email[] = $matricula;
                    $this->Aviso->enviar($matricula["Aviso"]["id"]);
                } else {
                    $this->enviarEmailResponsavel(array(
                        'to' => $matricula["Matricula"]["email_responsavel"],
                        'aluno' => $matricula["Matricula"]["nome"],
                        'aviso_id' => $matricula["Aviso"]["id"]
                    ));
                }
            endforeach;
//
//
//            print_r($alunos);
            if (count($responsaveis_sem_email) > 0) {
                $this->enviarEmailCoordenadora(array(
                    'alunos' => $responsaveis_sem_email
                ));
            }
        }

        $avisos = $this->Aviso->getAvisosAbertos();

        $this->set('avisos', $avisos);
    }
    
    public function TestalayoutEmail(){
        
    }

}
