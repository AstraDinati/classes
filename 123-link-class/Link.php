<?php
require_once 'Tag.php';
class Link extends Tag
{
    const ACTIVE = 'active';
    public function __construct()
    {
        $this->setAttr('href', '');
        parent::__construct('a');
    }
    
    // Переопределяем метод родителя:
    public function open()
    {
        $this->activateSelf(); // вызываем 
        return parent::open(); // вызываем 
    }
    
    private function activateSelf()
    {
        $path_info = pathinfo($_SERVER['REQUEST_URI']);
        if ($this->getAttr('href') === $path_info['basename']) {
            $this->addClass(self::ACTIVE);
        }
    }
}

// echo (new Link)->setAttr('href', "index.php")->setText('index')->
// 		show(); 

echo (new Link)
->setAttr('href', 'index.php')
->setAttr('class', 'link1 link2') 
->setText('index')
->show();