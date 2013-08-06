<?

/**
 *This will handle the data model
 */
class Model {

    function __construct() {

    }

    static function save_progress($data) {
        file_put_contents('progress.txt', $data . '%');
        return TRUE;
    }
    static function retreive_progress(){
        return file_get_contents('progress.txt');
    }

    static function save_data($content) {
        file_put_contents('store.txt', $content);
        file_put_contents('progress.txt', 'Complete');
    }

    static function retrieve_data() {
        return file_get_contents('store.txt');
    }

}
