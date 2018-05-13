##OPEN FILE
<?php
 
header("Content-type: application/pdf; charset=utf-8");
 
$file = fopen("http://localhost2/Verified.pdf", "r");
$content = "";
while($f = fgets($file,4096))
        {
        $content .= $f;
        }
echo $content
?>

##DOWNLOAD FILE
<?php

if(isset($_GET['filename'])) {
    if (!file_exists($filename = $_GET['filename'])){
        print "Файл " . $filename . "не найден!\r\n";
    } else {
        set_time_limit(0);
        header('HTTP/1.0 200 OK');
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        header('Content-Length: ' . (filesize($filename)));
        header('Content-Type: application/x-rar-compressed');
        @readfile($filename);
    }
}