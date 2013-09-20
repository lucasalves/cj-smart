<?php App::uses('AppController', 'Controller');

class GrupoUsuarioController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'GrupoUsuario';
    public $uses = array();

    public $scaffold;

    public function form(){
        $this->set('permissions', $this->GrupoUsuario->formCreateDefault());        
    }

    public function add_ajax(){
        $this->autoRender = false;

        $grupo = $this->GrupoUsuario->persist($this->request['data']);    
        echo json_encode($grupo);    
    }
}