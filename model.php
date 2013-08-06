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

    static function save_data($content) {
        file_put_contents('store.txt', $content);
    }

    static function retrieve_data() {

    }

}
