<?php
require_once 'Form.php';
require_once 'Input.php';

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
echo (new Input)->setAttr('name', 'num1');
echo (new Input)->setAttr('name', 'num2');
echo (new Input)->setAttr('name', 'num3');
echo (new Input)->setAttr('name', 'num4');
echo (new Input)->setAttr('name', 'num5');
echo (new Input)->setAttr('type', 'submit');
echo $form->close();

if (!empty($_GET)){
    echo $_GET['num1'] + $_GET['num2'] + 
    $_GET['num3'] + $_GET['num4'] + 
    $_GET['num5'];
}
// $form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

// echo $form->open();
// echo (new Input)->setAttr('name', 'year')->setAttr('value', date('Y'));
// echo (new Input)->setAttr('type', 'submit');
// echo $form->close();
