<?php
class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name];
    }

    public function del($name)
    {
        unset($_SESSION[$name]);
    }

    public function exists($name)
    {
        return (isset($_SESSION[$name]));
    }

    public function destroy()
    {
        session_destroy();
    }
}

$ssh = new SessionShell();

if ($ssh->exists('counter')) {
    $ssh->set('counter', $ssh->get('counter') + 1);
} else {
    $ssh->set('counter', 1);
}
echo $ssh->get('counter');