<?php

$content = '';
for ($i = 0; $i < 10; $i++) {
    $content .= "Time now is" . date('H:i:s') . "\\n";
    $data = $i * 100 / 10;
    file_put_contents('progress.txt', $data . '%');
    sleep(10);
}
file_put_contents('store.txt', $content);

return true;
