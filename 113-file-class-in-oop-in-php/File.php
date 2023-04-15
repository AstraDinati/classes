<?php
require_once 'iFile.php';
class File implements iFile
{
    private $filePath;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath()
    {
        return $this->filePath;
    } // путь к файлу
    public function getDir()
    {
        return basename(dirname($this->filePath));  
    }  // папка файла
    public function getName()
    {
        $path_info = pathinfo($this->filePath);
        return $path_info['filename'];
    } // имя файла
    public function getExt()
    {
        $path_info = pathinfo($this->filePath);
        return $path_info['extension'];
    }  // расширение файла
    public function getNameExt()
    {
        $path_info = pathinfo($this->filePath);
        return $path_info['basename'];
    }  // имя с расширением
    public function getSize()
    {
        return filesize($this->filePath);
    } // размер файла

    public function getText()
    {
        return file_get_contents($this->filePath);
    }          // получает текст файла
    public function setText($text)
    {
        file_put_contents($this->filePath, $text);
    }     // устанавливает текст файла
    public function appendText($text)
    {
        file_put_contents($this->filePath, 
        file_get_contents($this->filePath) . $text);
    }  // добавляет текст в конец файла 

    public function copy($copyPath)
    {
        copy($this->filePath, $copyPath);
    }    // копирует файл
    public function delete()
    {
        unlink($this->filePath);
    }           // удаляет файл
    public function rename($newName)
    {
        rename($this->filePath, $newName);
        $this->filePath = $newName;
    }   // переименовывает файл
    public function replace($newPath)
    {
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
    }  // перемещает файл
}

// $file = new File('C:/OSPanel/domains/laravel.local/tuturu.txt');
// echo $file->getDir();

// echo '<br>';

// echo $file->getExt();

// echo '<br>';

// echo $file->getName();

// echo '<br>';

// echo $file->getNameExt();

// echo '<br>';

// echo $file->getSize();

// echo '<br>';

// echo $file->getText();

// echo '<br>';

// $file->setText('rurutu');

// echo '<br>';

// echo $file->getText();

// echo '<br>';

// $file->appendText('!');

// echo $file->getText();

// // $file->copy('C:/OSPanel/domains/laravel.local/tuturu1.txt');

// // $file->delete();

// $file->rename('C:/OSPanel/domains/laravel.local/tuturu1.txt');
// $file->replace('C:/OSPanel/domains/laravel.local/new/tuturu1.txt');