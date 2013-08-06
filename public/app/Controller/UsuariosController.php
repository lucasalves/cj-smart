<?php App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Usuario';
    public $uses = array();

    public $scaffold;

     public function beforeFilter(){
        parent::beforeFilter();
        $this->set('fields', array('id', 'email', 'nome', 'ultimo_nome', 'usuario', 'ativo', 'grupo_usuario_id'));
    }

    public function login(){
    	if ($this->request->is('post')) {
	        if($this->Usuario->login($this->request['data'])) {
	           return $this->redirect(
                                    array(
                                        'controller' => 'home',
                                        'action'     => 'index'
                                    ) 
                                );
	        } else {
	            $this->Session->setFlash($this->Usuario->loginError);
	        }
    	}
    }

    public function perfil(){

    }

    public function logout(){
        $this->Usuario->logout();
     	$this->redirect('/');
    }
}