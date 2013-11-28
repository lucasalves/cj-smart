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


class Search {

    public $model_name = null;
    private $model     = null;

    public function setModel($name){
        $this->model_name = Inflector::humanize($name);

        App::uses($this->model_name, 'Model');
        $this->model = new $this->model_name;
    }

    public function getFields(){
        $response = array();

        $schema = $this->getSchema();
        foreach ($schema as $field => $value) {
            $response[] = $field;
        }
        return $response;
    }

    public function getSchema(){
        return $this->model->schema();
    }

    public function conditions($per){
        $response = array();

        $fields = $this->getFields();
        foreach ($fields as $field) {
            $response['or'][$this->model_name . '.' .$field . ' LIKE'] = '%' . trim($per) . '%';
        }

        return $response;
    }
}
