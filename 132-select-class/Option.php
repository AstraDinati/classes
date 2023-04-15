<?php
require_once 'Tag.php';
class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }
    public function __toString()
    {
        return parent::show();
    }
    public function setSelected()
    {
        $this->setAttr('selected', true);
        return $this;
    }
}
