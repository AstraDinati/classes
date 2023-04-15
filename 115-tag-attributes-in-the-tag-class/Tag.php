<?php
class Tag
{
    private $name;
    private $attr;
    public function __construct($name, $attr = [])
    {
        $this->name = $name;
        $this->attr = $attr;
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

$tag = new Tag('input', ['id' => 'test', 'class' => 'eee bbb']);
echo $tag->open();
