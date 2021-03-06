<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

App::import('Core', 'l10n');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     *  Define os componentes utilizados por toda aplicação
     *  
     * @var array
     */
    public $components = array(
        'Session',
        'Cookie',
        'FilterResults.Filter' => array(
            'auto' => array(
                'paginate' => false,
                'explode' => true, // recomendado
            ),
            'explode' => array(
                'character' => ' ',
                'concatenate' => 'AND',
            )
        )
    );
    var $helpers = array(
        'FilterResults.Search' => array(
            'operators' => array(
                'LIKE' => 'containing',
                'NOT LIKE' => 'not containing',
                'LIKE BEGIN' => 'starting with',
                'LIKE END' => 'ending with',
                '=' => 'equal to',
                '!=' => 'different',
                '>' => 'greater than',
                '>=' => 'greater or equal to',
                '<' => 'less than',
                '<=' => 'less or equal to'
            )
        )
    );
    
    public function beforeFilter() {
        $this->auth();
    }

    /**
     * Search for all controllers
     */
    public function search() {
        $this->loadModel('Search');
        $this->Search->setModel($this->request->query['in']);

        $options = array(
            'conditions' => $this->Search->conditions($this->request->query['per']),
            'limit' => 10
        );

        $this->paginate = $options;

        $this->loadModel($this->Search->model_name);
        $this->set('data', array(
            'rows' => $this->paginate($this->Search->model_name),
            'fields' => $this->Search->getFields()
                )
        );
        $this->render('/Search/index');
    }

    /*
     * controle de autenticação de usuário
     */

    private function auth() {
        $this->loadModel('Usuario');

        if ($this->Usuario->loggedIn() AND (
                $this->request->params['controller'] == 'usuarios' AND
                $this->request->params['action'] == 'login')
        ) {
            $this->redirect(
                    array(
                        'controller' => 'home',
                        'action' => 'index'
                    )
            );
        }

        if (
                !$this->Usuario->loggedIn() AND (
                $this->request->params['controller'] != 'usuarios' AND
                $this->request->params['action'] != 'login')
        ) {
            $this->Session->setFlash('Você precisa fazer login para acessar esta página');
            $this->redirect('/usuarios/login/');
        } else {
            if (!$this->Usuario->allowAccess($this->request->params)) {
                $this->Session->setFlash($this->Usuario->permissionError);
                $this->redirect(array('controller' => 'home', 'action' => 'index'));
            }
        }
    }

}
