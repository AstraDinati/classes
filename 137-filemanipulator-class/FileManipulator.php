<?php
class FileManipulator
{
    public function create($filePath)
    {
        file_put_contents($filePath, '');
    }

    public function delete($filePath)
    {
        unlink($filePath);
    }

    public function copy($filePath, $copyPath)
    {
        copy($filePath, $copyPath);
    }

    public function rename($filePath, $newName)
    {
        rename($filePath, $newName);
    }

    public function replace($filePath, $newPath)
    {
        rename($filePath, $newPath);
    }

    public function weigh($filePath)
    {
        filesize($filePath);
    }
}

$fm = new FileManipulator;

$fm->create('test.txt');

$fm->delete('test.txt');