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
class AulaController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
    public $name = 'Aula';
    public $uses = array();

    public $scaffold;

    public function get(){
    	$this->autoRender = false;
    	echo json_encode(
    					$this->Aula->toEvents(
    							$this->Aula->find('all', array(
															'conditions' => array('UNIX_TIMESTAMP(data) >= ' => $this->request->query['start'], 'UNIX_TIMESTAMP(data) <= ' => $this->request->query['end'])
														)
    							)
						)
    		);
    }

    public function update_date(){
    	$this->autoRender = false;
    	extract($this->request->data);
    	$aula = $this->Aula->find('all', array(
											'conditions' => array('Aula.id' => $id)
										)
    								);
    	$this->Aula->id   = $id;
  		$this->Aula->save(array('data' => date('Y-m-d', strtotime($delta . ' days', strtotime($aula[0]['Aula']['data'])))));
    }
    

}
