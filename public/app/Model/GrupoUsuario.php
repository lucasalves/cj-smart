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
class GrupoUsuario extends AppModel {
    public $useTable = 'usuario_grupo';

    public $displayField = 'nome';

    public $hasMany = array(
                          "Usuario" => array( 
                            "className"  => "Usuario",
                            "foreignKey" => "grupo_usuario_id",
                          ),
                          "GrupoPermissoes" => array( 
                            "className"  => "GrupoPermissao",
                            "foreignKey" => "usuario_grupos_id",
                          )
                        );

    public $validate = array(
                'nome' => array(
                       'rule'     => array('minLength', 1),
                       'required' => true,
                       'message'  => 'Digite um nome valido para grupo de usuário'
                )                           
    );

    public function formCreateDefault(){
      $default = 'master';
      $groupMirror = $this->find('all', array(
                                          'conditions' => array(
                                                            'nome' => $default                                                            
                                          )
                                )
                            );

      return $this->formatToForm($groupMirror);
    }

    public function formatToForm($unstructured){
      if(empty($unstructured[0])){
        return array();
      }

      $unstructured = $unstructured[0];
      extract($unstructured);

      $organized = array();
      foreach($GrupoPermissoes as $permission){
        $organized[] = array(
                          'pagina'     => $permission['pagina'],
                          'visualizar' => $permission['visualizar'],
                          'editar'     => $permission['editar'],
                          'apagar'     => $permission['apagar']
                      );
      }

      return array('GrupoPermissoes' => $organized);
    }

    public function persist($data){
      $data['GrupoUsuario']['nome'] = strtolower($data['GrupoUsuario']['nome']);
      $group = $this->save($data['GrupoUsuario']);

      //set falses
      $permissions = array();

      $i = 0;
      foreach($data['GrupoPermissao'] as $page => $permission){
        $permission = (is_array($permission) ? $permission : array());

        foreach ($permission as $value) {
          $permissions[$i][$value] = true;
        }

        $permissions[$i]['pagina']            = $page;
        $permissions[$i]['usuario_grupos_id'] = $group['GrupoUsuario']['id'];

        $permissions[$i] = array_merge(array('visualizar' => 0, 'editar' => 0, 'apagar' => 0), $permissions[$i]);
       $i += 1;
      }

      $this->GrupoPermissoes->saveAll($permissions);
    }
}
