<?php App::uses('AppModel', 'Model');

class Usuario extends AppModel{
	public $name = 'Usuario';

	public $useTable   = 'usuarios';

	public $validate = array(
				'senha' => array(
					'identicalFieldValues' => array(
        				'rule' => array('identicalPassValues', 'confirmar_senha' ),
        				'message' => 'As senhas não confere',
        				'required'   => false,
        				'allowEmpty' => true
                	),

				)
			);	

	public $belongsTo = "GrupoUsuario";

	public $loginError = null;


	public function beforeSave($options){
		$pass = $this->data[ $this->name ]['senha'];

		if(empty($pass)){
			$user = $this->find('all', array(
							'conditions' => array( $this->name . '.id' => $this->data[ $this->name ]['id'])
						)
					);
			$this->data[ $this->name ]['senha'] = $user[0][$this->name]['senha'];
		}

		 return true;
	}

	public function identicalPassValues($field=array(), $compare_field=null ){
		$confirm = $this->data[ $this->name ][$compare_field];
		
		if($confirm == $this->data[ $this->name ]['senha']){
			$this->data[ $this->name ]['senha'] = md5($this->data[ $this->name ]['senha']);
			return true;
		}

		return false;
	}

	/**
	 * Regra de Login.
	 *
	 * @access public
	 * @param  array data request : Array('Usuario' => array('usuario' => 'joao', 'senha' => '123'))
	 * @return boolean
	 *
	 */

	public function login($data){
		if(!$this->valid($data)){
			return false;
		}

		if($user = $this->get($data)){
			$this->setCredentials($user);
			return true;
		}

		return false;
	}

	/**
	 * Verifica se todos os campos necessarios para login do usuário estão presentes.
	 *
	 * @access private
	 * @param  array data request : Array('Usuario' => array('usuario' => 'joao', 'senha' => '123'))
	 * @return boolean
	 *
	 */

	private function valid($data){
		if(empty($data['Usuario'])){
			$this->loginError = 'Os campos usuário e senha são obrigatórios.';
			return false;
		}

		if(empty($data['Usuario']['usuario'])){
			$this->loginError = 'O campo usuário é obrigatórios.';
			return false;
		}

		if(empty($data['Usuario']['senha'])){
			$this->loginError = 'O campo senha é obrigatórios.';
			return false;
		}

		return true;
	}


	/**
	 * Obtem os dados do usuário caso exita e esteja ativo caso contrario retorna false
	 *
	 * @access private
	 * @param  array data request : Array('Usuario' => array('usuario' => 'joao', 'senha' => '123'))
	 * @return array|boolean
	 *
	 */

	private function get($data){
		$data = $data['Usuario'];

		$user = $this->find(
						'all',
						array(
							'conditions' => array(
												'usuario' => $data['usuario'],
												'senha'	  => md5($data['senha'])
											)
						)
					);

		if(empty($user[0]['Usuario'])){
			$this->loginError = 'Nome de usuário incorreto ou senha incorreta.';
			return false;
		}

		$user = $user[0];

		if($user['Usuario']['ativo'] == false){
			$this->loginError = 'Este usuário esta desativado.';
			return false;
		}

		return $user;
	}

	
	/**
	 * Seta credenciais do usuário na sessão para permitir a nevegação pelo sistema
	 *
	 * @access private
	 * @param  array user db: Array ( [id] => 1 [email] => joao@hotmail.com [nome] => João [ultimo_nome] => Cunha [usuario] => joao [senha] => 6f73e8c9a7cf01628ed890ba17e585a55b5eb3cc [ativo] => 1 [grupo_usuario_id] => 1 ) 
	 * @return voida
	 *
	 */

	private function setCredentials($user){
		unset($user['Usuario']['senha']);
		SessionComponent::write('Usuario.credenciais', $user);
	}

	/**
	 * Verifica se o usuário esta logado
	 *
	 * @access private
	 * @return boolean
	 *
	 */

	public function loggedIn(){
		$user = SessionComponent::read('Usuario.credenciais');
		return count($user['Usuario']) >= 7;
	}

	
	/**
	 * Remove a sessão do usuário
	 * @access public
	 * @return void
	 *
	 */

	public function logout(){
		SessionComponent::delete('Usuario.credenciais');
	}
}