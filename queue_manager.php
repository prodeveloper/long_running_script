<?php
require_once 'helpers.php';
require_once 'model.php';
/**
 * @author Chencha Jacob Gisore
 * @link www.chenchatech.com
 */

class Queue_manager  {
    //Write the path to your worker here
    static $path_to_worker='http://localhost/blog/long_running/worker.php';
	function __construct() {

	}
    static function add($request){
        //Send any parameters that the worker needs.
        $request=http_build_query(compact('request'),'&amp');
        $url=self::$path_to_worker . "?$request";
        curl_get_contents($url,false,true);
    }
    static function progress($request){
        $data=Model::retreive_progress();
        return $data;
    }
    static function get_resource($request){
        return Model::retrieve_data();
    }
}
