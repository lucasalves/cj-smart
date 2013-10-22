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
class Geolocalizacao extends AppModel {

    public $useTable = '';
    public $principal;
    public $mapOptions = array(
        'zoom' => 17,
        'center' => 'new google.maps.LatLng( -23.572158606928717, -46.62534955000001)',
        'mapTypeId' => 'google.maps.MapTypeId.ROADMAP'
    );
    public $map;
    public $imagens;
    public $box_mapa = "map_canvas";
    public $id = 0;
    public $icones = array('cursando' => 'aluno-cursando.png', 'empresa' =>'empresa.png','formado' => 'aluno-formado.png');
    public $itens = array();

    function render() {
        $render = "";

        $render .= "function initialize() {";

        $render .= "
        var mapOptions = {
            zoom: {$this->mapOptions["zoom"]},
            center: {$this->mapOptions["center"]},
            mapTypeId: {$this->mapOptions["mapTypeId"]}
        }";


        $render .= "
        var map = new google.maps.Map(document.getElementById(\"{$this->box_mapa}\"), mapOptions);
            ";



        foreach ($this->itens as $item):
            $render.= $item;
        endforeach;

        $render .="}";
        return $render;
    }

    function setItem($dados) {

        $this->id = $this->id + 1;

        $item = "
        var cliente_{$this->id} = new google.maps.Marker({
            position: new google.maps.LatLng( {$dados["latitude"]}, {$dados["longitude"]}),
            map: map,
            title:\"{$dados['title']}\",
        icon: ajaxurl + 'img/geolocalizacao/{$this->icones[$dados['icon']]}'
        });
        ";


        $item .="
        var html_{$this->id} = '{$dados['conteudo_html']}';
        ";

        $item .="
        var conteudo_cliente_{$this->id} = new google.maps.InfoWindow({
            content: html_{$this->id}
        });  
        ";

        $item .="
        google.maps.event.addListener(cliente_{$this->id}, 'click', function() {
            conteudo_cliente_{$this->id}.open(map,cliente_{$this->id});
        });
        ";

        $this->itens[] = $item;
    }

    public function getCoordenadas($address) {

        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');

        $output = json_decode($geocode);


        return array(
            'lat' => $output->results[0]->geometry->location->lat
            , 'long' => $output->results[0]->geometry->location->lng
        );
    }
    
    public function formatarEndereco($endereco){
        return str_replace(" ","+", $endereco);
    }            

}
