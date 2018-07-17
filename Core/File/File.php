<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/07/2018
 * Time: 22:23
 */

namespace Core\File;

class File
{
    protected $filePath;

    public function __construct(string $path)
    {
        $this->filePath = $path;
    }

    public function createFile()
    {
        file_put_contents($this->filePath, '');
    }

    public function resetFile()
    {
        $this->createFile();
    }

    public function deleteFile()
    {
        if($this->fileExists())
        {
            return unlink($this->filePath);
        }
    }

    protected function fileExists()
    {
        return file_exists($this->filePath);
    }
}