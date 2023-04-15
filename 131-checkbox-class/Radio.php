<?php
require_once 'Tag.php';
require_once 'Hidden.php';
class Radio extends Tag
{
    public function __construct()
    {
        $this->setAttr('name', 'radio');
        $this->setAttr('type', 'radio');
        parent::__construct('input');
    }
    
}
