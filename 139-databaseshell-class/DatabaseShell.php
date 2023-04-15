<?php
class DatabaseShell
{
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->link = mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    public function save($table, $data)
    {
        $query = "INSERT INTO `$table` (`" . implode("`, `", array_keys($data)) . "`) VALUES ('" . implode("', '", $data) . "')";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // сохраняет запись в базу
    }

    public function del($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // удаляет запись по ее id
    }

    public function delAll($table, $ids)
    {
        $id_list = implode(',', $ids);
        $query = "DELETE FROM `$table` WHERE `id` IN ($id_list)";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // удаляет записи по их id
    }

    public function get($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id=$id";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // получает одну запись по ее id
    }

    public function getAll($table, $ids)
    {
        $id_list = implode(',', $ids);
        $query = "SELECT * FROM `$table` WHERE `id` IN ($id_list)";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // получает массив записей по их id
    }

    public function selectAll($table, $condition)
    {
        $query = "SELECT * FROM `$table` WHERE $condition";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        // получает массив записей по условию
    }
}

$db = new DatabaseShell('localhost', 'root', '', 'mydb');

// $db->del('users', 7);
// $db->save('users', ['name'=>'user7', 'age'=>26, 'salary'=>1000]);