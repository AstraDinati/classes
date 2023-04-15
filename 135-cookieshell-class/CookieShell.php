<?php
class CookieShell
{
    public function set($name, $value, $time)
    {
        setcookie($name, $value, $time);
        $_COOKIE[$name] = $value;
    }

    public function get($name)
    {
        return $_COOKIE[$name];
    }

    public function del($name)
    {
        unset($_COOKIE[$name]);
        setcookie($name, null, time());
    }

    public function exists($name)
    {
        return (isset($_COOKIE[$name]));
    }
}

$csh = new CookieShell;
// $csh->set('counter', 1, 3600);
// echo $csh->get('counter') + 1;
// var_dump($csh->exists('counter'));


if ($csh->exists('counter')) {
    $csh->set('counter', $csh->get('counter') + 1, time() + 3600);
} else {
    $csh->set('counter', 1, time() + 3600);
}
echo $csh->get('counter');