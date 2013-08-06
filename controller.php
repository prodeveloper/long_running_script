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
class Controller {

    function __construct() {

    }

    /**
     * Check progress of request
     * @param {String} $request
     */
    function check_progress($request) {
        return Queue_manager::progress($request);
    }

    /**
     * Add request to queue
     * @param {String} $request
     */
    function queue($request) {
        Queue_manager::add($request);
        return TRUE;
    }

}
