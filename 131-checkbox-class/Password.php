<?php
require_once 'Input.php';
class Password extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'password');
        parent::__construct();
    }
}