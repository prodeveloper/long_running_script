<?php
require_once 'queue_manager.php';
require_once 'helpers.php';

$controller = new Controller();
$request = isset($_GET['request']) ? $_GET['request'] : false;
$progress = isset($_GET['progress']) ? $_GET['progress'] : FALSE;
//Request not specified return bad request
if (!$request) {
    $response = "No request provided";
    return_value($response, 400);
    die();
}
//Act if user requested progress information
if ($progress) {
    $curr_progress = $controller -> check_progress($request);
    //Return resouce if we are finished processing
    if($curr_progress=='Complete'){
        $curr_progress=$controller->get_resource($request);
    }
    return_value($curr_progress, 200);
}
//Add job to queue
else {
    $controller -> queue($request);
    $response = "Request received please wait while we process";
    return_value($response, 201);
}

/**
 *
 */
class Controller extends Queue_manager{

    function __construct() {

    }

    /**
     * Check progress of request
     * @param {String} $request
     */
    function check_progress($request) {
        return self::progress($request);
    }
    function get_resource($request){
        return self::get_resource($request);
    }

    /**
     * Add request to queue
     * @param {String} $request
     */
    function queue($request) {
        self::add($request);
        return TRUE;
    }

}
