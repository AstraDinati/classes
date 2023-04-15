<?php
require_once 'Form.php';
require_once 'Submit.php';
require_once 'Password.php';
require_once 'Hidden.php';
require_once 'Textarea.php';
require_once 'Checkbox.php';
require_once 'Radio.php';
require_once 'Option.php';
require_once 'Select.php';

// $form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

// echo $form->open();
// echo (new Input)->setAttr('name', 'num1');
// echo (new Input)->setAttr('name', 'num2');
// echo (new Input)->setAttr('name', 'num3');
// echo (new Input)->setAttr('name', 'num4');
// echo (new Input)->setAttr('name', 'num5');
// echo (new Input)->setAttr('type', 'submit');
// echo $form->close();

// if (!empty($_GET)){
//     echo $_GET['num1'] + $_GET['num2'] + 
//     $_GET['num3'] + $_GET['num4'] + 
//     $_GET['num5'];
// }
// $form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

// echo $form->open();
// echo (new Input)->setAttr('name', 'year')->setAttr('value', date('Y'));
// echo (new Input)->setAttr('type', 'submit');
// echo $form->close();

// $form = (new Form)->setAttrs(['action' => '', 'method' => 
// 'GET']); 

// echo $form->open();
// echo (new Input)->setAttr('name', 'year');
// echo new Submit;
// echo $form->close();

// $form = (new Form)->setAttrs([
//     'action' => '',
//     'method' => 'GET'
// ]);

// echo $form->open();
// echo (new Input)->setAttr('name', 'login');
// echo (new Password)->setAttr('name', 'passw');
// echo new Submit;
// echo $form->close();

// $form = (new Form)->setAttrs([
//     'action' => '',
//     'method' => 'GET'
// ]);

// echo $form->open();
//     echo (new Hidden)->setAttr('name', 'id')->setAttr('value', '123');
//     echo (new Input)->setAttr('name', 'year');
//     echo new Submit;
// echo $form->close();

// $form = (new Form)->setAttrs(['action' => '', 'method' => 
// 'GET']); 

// echo $form->open();
// echo (new Input)->setAttr('name', 'user');
// echo (new Textarea)->setAttr('name', 'message')->show();
// echo new Submit;
// echo $form->close();

// $form = (new Form)->setAttrs([
//     'action' => '',
//     'method' => 'GET'
// ]);

// echo $form->open();
//     echo (new Checkbox)->setAttr('name', 'checkbox');
//     echo (new Input)->setAttr('name', 'user');
//     echo new Submit;
// echo $form->close();

// $form = (new Form)->setAttrs([
//     'action' => '',
//     'method' => 'GET'
// ]);

// echo $form->open();
// echo (new Hidden)->setAttr('name', 'radio')->setAttr('value', '0');
// echo (new Radio)->setAttr('value', '1');
// echo (new Radio)->setAttr('value', '2');
// echo (new Radio)->setAttr('value', '3');
// echo new Submit;
// echo $form->close();

$form = (new Form)->setAttrs([
    'action' => '',
    'method' => 'GET'
]);
echo $form->open();
echo (new Select)->setAttr('name', 'list')
->add( (new Option())->setText('item1') )
->add( (new Option())->setText('item2') )
->add( (new Option())->setText('item3') )
->show();
echo new Submit;
echo $form->close();