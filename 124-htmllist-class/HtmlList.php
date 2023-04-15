<?php
require_once 'Tag.php';
require_once 'ListItem.php';
class HtmlList extends Tag
{
    private $items = [];
    public function addItem(ListItem $li)
    {
        $this->items[] = $li;
        return $this;
    }
    public function __toString()
    {
        $result = $this->open();

        foreach($this->items as $item){
            $result .= $item;
        }

        $result .= $this->close();

        return $result;
    }
}

// $list = new HtmlList('ul');
	
// echo $list
//     ->addItem((new ListItem())->setText('item1'))
//     ->addItem((new ListItem())->setText('item2'))
//     ->addItem((new ListItem())->setText('item3'));