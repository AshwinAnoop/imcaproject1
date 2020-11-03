<?php
$filename=$_POST['showrep'];


$filePath = 'C:\wamp64\www\myproject\reportfiles/'.$filename;
if (!file_exists($filePath)) {
    echo "The file $filePath does not exist";
    die();
}

header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
readfile($filePath);
?>