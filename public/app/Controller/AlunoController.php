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
class AlunoController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
    public $name = 'Aluno';
    public $uses = array('Aluno');

    public $scaffold;

    public function beforeFilter(){
        parent::beforeFilter();
        $this->set('fields', array('id', 'nome','rg', 'email'));
    }

    public function add_ajax(){
    	$this->autoRender = false;

    	if($this->request->is('post') || $this->request->is('put')){
            $this->Aluno->set($this->request->data);
            
            if($this->Aluno->validates()){
                $resp = $this->Aluno->save($this->request->data);
	   				$resp = array_merge(
    							array('status' => true),
    							$resp   					
    						);
    		}else{    			
    			$resp = array_merge(
    							array('status' => false),
    							array(
                                    'errors' => $this->Aluno->validationErrors
                                )
    						);
    		}
    	}

    	echo json_encode($resp);
    }

    public function view_or_add(){
        $this->disableCache();
        $this->redirect( $this->Aluno->viewOrAdd( $this->request->query ), 301);
    }

    public function stats($id){
        $this->autoRender = false;
        $this->disableCache();
        echo json_encode( $this->Aluno->statisticsNotes($id) );
    }
    
    
}
