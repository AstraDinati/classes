<?php
require_once 'HtmlList.php';
class Ol extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ol');
    }
}

$list = new Ol();
	
echo $list
    ->addItem((new ListItem())->setText('item1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));