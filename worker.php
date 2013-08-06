<?php
require_once 'model.php';
$content = '';
for ($i = 0; $i < 10; $i++) {
    $content .= "Time now is" . date('H:i:s') . "\\n";
    $data = $i * 100 / 10;
    Model::save_progress($data);
    sleep(10);
}
Model::save_data($content);

echo "Done";
