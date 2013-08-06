<?php
require_once 'helpers.php';
/**
 *
 */
class Queue_manager  {
    static $path_to_worker='http://localhost/blog/long_running/worker.php';
	function __construct() {

	}
    static function add($request){
        $request=http_build_query(compact('request'),'&amp');
        $url=self::$path_to_worker . "?$request";
        curl_get_contents($url,false,true);
    }
    static function progress($request){
        $data=file_get_contents('progress.txt');
        return $data;
    }
}
