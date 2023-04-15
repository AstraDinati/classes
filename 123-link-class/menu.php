<?php
require_once 'Link.php';
echo '<br>';
for($i=1;$i<=5;++$i){
    echo (new Link())->setAttr('href',"$i.php")->setText("aboba$i")->show() . '<br>';
}