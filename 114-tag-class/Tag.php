<?php
class Tag
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function open()
    {
        return "<$this->name>";
    }
    public function close()
    {
        return "</$this->name>";
    }
}

// $div = new Tag('div');

// echo $div->open() . 'text' . $div->close();

// $img = new Tag('img');

// echo $img->open();

// $header = new Tag('header');
// echo $header->open() . 'header сайта' . $header->close();