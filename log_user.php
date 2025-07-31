<?php
if (isset($_GET['username'])) {
    $ua = $_GET['username'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date("Y-m-d H:i:s");
    file_put_contents("logs.txt", "[$time] Via JS - IP: $ip - UserAgent: $ua\n", FILE_APPEND);
}
?>
