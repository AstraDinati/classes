<?php
class Tag
{
    private $name;
    private $attrs = [];
    private $text = '';
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addClass($className)
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attrs['class'] = $className;
        }
        return $this;
    }
    public function removeClass($className)
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (in_array($className, $classNames)) {
                $classNames = $this->removeElem($className, $classNames);
                $this->attrs['class'] = implode(' ', $classNames);
            }
        }
        return $this;
    }
    public function getAttrs()
    {
        return $this->attrs;
    }
    public function getAttr($atrName)
    {
        if(isset($this->attrs[$atrName])){
            return $this->attrs[$atrName];
        } else {
            return null;
        }
    }
    public function getName()
    {
        return $this->name;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
    public function setAttr($name, $value)
    {
        $this->attrs[$name] = $value;
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
        unset($this->attrs[$name]);
        return $this;
    }
    public function open()
    {
        $name = $this->name;
        $attrsStr = $this->getAttrStr($this->attrs);
        return "<$name $attrsStr>";
    }
    public function close()
    {
        return "</$this->name>";
    }
    public function show()
    {
        return $this->open() . $this->text . $this->close();
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
