<?php
class Tag
{
    private $name;
    private $attr;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addClass($className)
    {
        if (isset($this->attr['class'])) {
            $classNames = explode(' ', $this->attr['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attr['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attr['class'] = $className;
        }
        return $this;
    }
    public function removeClass($className)
    {
        if (isset($this->attr['class'])) {
            $classNames = explode(' ', $this->attr['class']);
            if (in_array($className, $classNames)) {
                $classNames = $this->removeElem($className, $classNames);
                $this->attr['class'] = implode(' ', $classNames);
            }
        }
        return $this;
    }
    public function setAttr($name, $value)
    {
        $this->attr[$name] = $value;
        return $this;
    }
    public function setAttrs($attrs)
    {
        foreach ($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }
        return $this;
    }
    public function removeAttr($name)
    {
        unset($this->attr[$name]);
        return $this;
    }
    public function open()
    {
        $name = $this->name;
        $attrsStr = $this->getAttrStr($this->attr);
        return "<$name $attrsStr>";
    }
    public function close()
    {
        return "</$this->name>";
    }
    private function removeElem($elem, $arr)
    {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);

        return $arr;
    }
    private function getAttrStr($attr)
    {
        if (!empty($attr)) {
            $result = '';
            foreach ($attr as $name => $value) {
                if ($value === true) {
                    $result .= "$name";
                } else {
                    $result .= "$name=\"$value\" ";
                }
            }
            return $result;
        }
        return '';
    }
}

// echo (new Tag('input'))->addClass('eee')->open();

// echo (new Tag('input'))->addClass('eee')->addClass('bbb')->open();

// echo (new Tag('input'))
// 		->setAttr('class', 'eee bbb')
// 		->addClass('kkk')->open();

// echo (new Tag('input'))
//     ->setAttr('class', 'eee bbb')
//     ->addClass('eee') // такой класс уже есть и не добавится
//     ->open();

echo (new Tag('input'))
    ->setAttr('class', 'eee zzz kkk') // добавим 3 класса
    ->removeClass('zzz') // удалим класс 'zzz'
    ->open();
