<?php
require_once 'Tag.php';
require_once 'Option.php';
class Select extends Tag 
{
    private $options = [];
    public function __construct()
    {
        parent::__construct('select');
    }
    public function add(Option $newOption)
    {
        $inputName = $this->getAttr('name');
        // var_dump($_REQUEST[$inputName]);
        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                if ($_REQUEST[$inputName] === $newOption->getText())
                $newOption->setSelected();
            }
        }
        $this->options[] = $newOption;
        
        return $this;
    }
    public function show()
    {
        $result = $this->open();

        foreach($this->options as $option){
            $result .= $option;
        }

        $result .= $this->close();

        return $result;
    }
}