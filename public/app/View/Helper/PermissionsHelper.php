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
class PermissionsHelper extends Helper {
    
    private static $permissions = array();

    /**
     * Verifica se o item de menu deve aparece
     * com base nas permissões de visualização
     *
     * @access public
     * @param  string ($item -> slug "Please :p ")
     * @param  string ($name -> name for display)
     * @return string || void
     *
     */

    public function itemMenu($item, $name, $url = null){
        $permissions = SessionComponent::read('Usuario.permissions');
        
        $url = ($url ? $url : '/' . $item);

        if(!empty($permissions[$item]) && $permissions[$item]['visualizar']):
            return '<li><a href="' . Router::url($url) . '">' . $name . '</a></li>';
        endif;
    }

    public function groupMenu($group, $name){
        $permissions = SessionComponent::read('Usuario.permissions');
        
        if(!empty($permissions[$group]) && $permissions[$group]['visualizar']):
            return '<li class="nav-header">' . $name . '</li>';
        endif;
    }

    
    
}
