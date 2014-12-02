<?php
$files = glob('../data/picture/*.*');
$time  = time();

foreach ($files as $file) {
    if (is_file($file)) {
        if ($time - filemtime($file) >= 60*60*24*7) {// 7 days
            unlink($file);
        } else {
            //echo date ('F d Y H:i:s.', filemtime($file)).'<br />';
        };
    };
};
?>