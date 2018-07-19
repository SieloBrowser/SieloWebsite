<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/05/2018
 * Time: 17:54
 */

namespace Core\Language;

use Core\File\IniFile;

class Lang
{

    private $lang;
    private $basePart = null;
    private $files = [];

    public function __construct(string $lang, string $basePart = null)
    {
        $this->lang = $lang;
        $this->basePart = $basePart;
        if(!is_null($basePart))
        {
            $this->files['default'] = ["file" => new IniFile($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_PATH.DIRECTORY_SEPARATOR.APPLICATION_PATH.DIRECTORY_SEPARATOR.$basePart.DIRECTORY_SEPARATOR.'Langs'.DIRECTORY_SEPARATOR.$lang.DIRECTORY_SEPARATOR.'default.ini'), "use" => true];
        }
    }

    public function addFile(string $fileName, string $part = null)
    {
        if(!is_null($this->basePart))
        {
            $filePath = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_PATH.DIRECTORY_SEPARATOR.APPLICATION_PATH.DIRECTORY_SEPARATOR.((isset($part)) ? $part.DIRECTORY_SEPARATOR : (isset($this->basePart) ? $this->basePart.DIRECTORY_SEPARATOR : '' )).'Langs'.DIRECTORY_SEPARATOR.$this->lang.DIRECTORY_SEPARATOR.$fileName.'.ini';
            if(file_exists($filePath))
            {
                $this->files[$fileName] = ["file" => new IniFile($filePath), "use" => true];
            } else {
                throw new LangException('[Lang] {addFile} => file given: '.$fileName.' doesn\'t exists');
            }
        } else {
            throw new LangException('[Lang] {addFile} => Base site part is not set. Please give a part for search the file');
        }
    }

    public function useFile(string $fileName, bool $use)
    {
        if($this->fileExists($fileName))
        {
            $this->files[$fileName]['use'] = $use;
        } else {
            throw new LangException('[Lang] {useFile} => File given doesn\'t exists');
        }
    }

    public function deleteFile($fileName)
    {
        if($this->fileExists($fileName))
        {
            unset($this->files[$fileName]);
        } else {
            throw new LangException('[Lang] {deleteFile} => File given doesn\'t exists');
        }
    }

    public function getKey($keyName)
    {
        foreach ($this->files as $key => $file)
        {
            if($file['use'] === true)
            {
                $value = $file['file']->getKey($keyName);
                if($value !== false)
                {
                    return $value;
                }
            }
        }
    }

    private function fileExists(string $fileName)
    {
        return isset($this->files[$fileName]);
    }
}