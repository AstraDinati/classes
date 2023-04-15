<?php
require_once 'TagHelper.php';
class FormHelper extends TagHelper
{
    public function openForm($attrs = [])
    {
        return $this->open('form', $attrs);
    }

    public function closeForm()
    {
        return $this->close('form');
    }

    public function input($attrs = [])
    {
        if (isset($attrs['name'])) {
            $name = $attrs['name'];

            if (isset($_REQUEST[$name])) {
                $attrs['value'] = $_REQUEST[$name];
            }
        }

        return $this->open('input', $attrs);
    }

    public function password($attrs = [])
    {
        $attrs['type'] = 'password';
        return $this->input($attrs);
    }

    public function hidden($attrs = [])
    {
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }

    public function submit($attrs = [])
    {
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }

    public function checkbox($attrs = [])
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;

        if (isset($attrs['name'])) {
            $name = $attrs['name'];

            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $attrs['checked'] = true;
            }

            $hidden = $this->hidden(['name' => $name, 'value' => '0']);
        } else {
            $hidden = '';
        }

        return $hidden . $this->open('input', $attrs);
    }
    public function textarea()
    {
        $attrs['name'] = 'text';
        $name = $attrs['name'];
        if ($name) {
            if (isset($_REQUEST[$name])) {
                $value = $_REQUEST[$name];

                return $this->open('textarea', $attrs) . $value . $this->close('textarea');
            }
        } else {
            return $this->open('textarea') . $this->close('textarea');
        }
    }
    public function select($selAttrs = [], $optAttrs = [])
    {
        $result = $this->open('select', $selAttrs);
        foreach ($optAttrs as $elems){
            if (isset($selAttrs['name'])) {
                $name = $selAttrs['name'];
    
                if (isset($_REQUEST[$name])){
                    if ($_REQUEST[$name] == $elems['attrs']['value']){
                        $elems['attrs'] = ['selected' => true];
                    }
                }}
            $result .= $this->open('option', $elems['attrs']);
            $result .= $elems['text'];
            $result .= $this->close('option');
        }
        $result .= $this->close('select');
        return $result;
    }
}

$fh = new FormHelper();

echo $fh->openForm(['action' => '', 'method' => 'GET']);
echo $fh->input(['name' => 'year']);
echo $fh->checkbox(['name' => 'check']);
echo $fh->password(['name' => 'pass']);
echo $fh->textarea();
echo $fh->select(
    ['name' => 'list', 'class' => 'eee'],
    [
        ['text' => 'item1', 'attrs' => ['value' => '1']],
        ['text' => 'item2', 'attrs' => ['value' => '2']], 
        ['text' => 'item3', 'attrs' => ['value' => '3', 'class' => 'last']], 
    ],
    
);
echo $fh->submit();
echo $fh->closeForm();
