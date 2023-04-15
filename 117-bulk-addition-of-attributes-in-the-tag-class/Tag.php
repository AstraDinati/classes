<?php
class Tag
{
    private $name;
    private $attr;
    public function __construct($name)
    {
        $this->name = $name;
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
    private function getAttrStr($attr)
    {
        if (!empty($attr)) {
            $result = '';
            foreach ($attr as $name => $value) {
                $result .= "$name=\"$value\" ";
            }
            return $result;
        }
        return '';
    }
}

$tag = new Tag('input');

echo $tag
    ->setAttrs(['id' =>'test', 'class' => 'eee'])
    ->setAttr('type', 'text')->open();
