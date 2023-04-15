<?php
class Validator
{
    public function isEmail($str)
    {
        if (preg_match('#.+@.+\..+#i', $str) == 1){
            return true; 
        }
        return false;
        // проверяет строку на то, что она корректный email
    }

    public function isDomain($str)
    {
        if (preg_match('#^(https?|ftp|smtp):\/\/[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$#', $str) == 1){
            return true; 
        }
        return false;
        // проверяет строку на то, что она корректное имя домена
    }

    public function inRange($num, $from, $to)
    {
        return ($num >= $from and $num <= $to);
        // проверяет число на то, что оно входит в диапазон
    }

    public function inLength($str, $from, $to)
    {
        return (strlen($str) >= $from and strlen($str) <= $to);
        // проверяет строку на то, что ее длина входит в диапазон
    }
}

$va = new Validator;

var_dump($va->inLength('mne snilsya son pro skorpiona', 3, 33));

var_dump($va->isDomain('https://ru.stackoverflow.com'));

var_dump($va->isEmail('vad.ik@mail.ru'));