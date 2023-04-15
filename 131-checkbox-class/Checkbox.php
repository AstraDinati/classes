<?php
require_once 'Tag.php';
require_once 'Hidden.php';
class Checkbox extends Tag
{
    public function __construct()
    {
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', '1');
        parent::__construct('input');
    }
    public function __toString()
    {
        return $this->open();
    }
    public function open()
    {
        $name = $this->getAttr('name');

        if ($name) {

            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $this->setAttr('checked', true);
            }
            $hidden = (new Hidden)
                ->setAttr('name', $name)
                ->setAttr('value', '0');
        } else {
            $hidden = '';
        }
        return $hidden->open() . parent::open();
    }
}
