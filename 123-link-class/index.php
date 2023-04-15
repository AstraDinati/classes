<?php
include_once 'menu.php';
echo $_SERVER['REQUEST_URI'];
$path_info = pathinfo($_SERVER['REQUEST_URI']);
echo '<br>';
echo $path_info['basename'];