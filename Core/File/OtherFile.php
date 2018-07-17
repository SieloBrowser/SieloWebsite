<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/07/2018
 * Time: 11:49
 */

namespace Core\File;


class OtherFile extends File
{
    private $lines;

    public function __construct($path, $fileExtension)
    {
        parent::__construct($path.$fileExtension);
        $this->lines = file($path);
    }

    public function getLine(int $line)
    {
        if($this->lineExists($line))
        {
            return $this->lines[$line];
        }
    }

    public function deleteLine(int $line)
    {
        if($this->lineExists($line))
        {
            unset($this->lines[$line]);
        }
        file_put_contents($this->filePath, $this->lines);
    }

    public function alterLine(int $line, string $newValue)
    {
        if($this->lineExists($line))
        {
            $this->lines[$line] = $newValue;
        }
        file_put_contents($this->filePath, $this->lines);
    }

    private function lineExists(int $line)
    {
        return isset($this->lines[$line]);
    }

}