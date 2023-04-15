<?php
require_once 'Tag.php';
class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr('src', '')->setAttr('alt', '');
        parent::__construct('img');
    }
    public function __toString()
    {
        return parent::open();
    }
}

$img = new Image();

echo $img->setAttr('src', '../1.jpeg')->setAttr('width', 300)->setAttr('height', 200);