<?php
require_once 'HtmlList.php';
class Ul extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ul');
    }
}

$list = new Ul();
	
echo $list
    ->addItem((new ListItem())->setText('item1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));