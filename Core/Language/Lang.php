<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/05/2018
 * Time: 17:54
 */

namespace Core\Language;

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
            $this->files['default'] = ["file" => fopen($_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$basePart.'/Langs/'.$lang.'/default.ini', 'r'), "use" => true];
    }

    public function addFile(string $fileName, string $part = null)
    {
        if(!is_null($this->basePart))
        {
            $filePath = $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.((isset($part)) ? $part : $this->basePart).'/Langs/'.$this->lang.'/'.$fileName.'.ini';
            if(file_exists($filePath))
            {
                $this->files[$fileName] = ["file" => fopen($filePath, 'r'), "use" => true];
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
        foreach ($this->files as $file)
        {
            if($file['use'] === true)
            {
                $file = $file['file'];
                while(($buffer = fgets($file)) !== false)
                {
                    $currentKey = substr($buffer, 0, strpos($buffer, '='));
                    if(strpos($buffer, $keyName) !== false && $keyName === $currentKey)
                    {
                        $start = strpos($buffer, '=');
                        $start++;
                        $value = substr($buffer, $start, strlen($buffer));

                        return $value;
                    }
                }
            }

            fseek($file, 0);
        }
        return false;
    }

    private function fileExists(string $fileName)
    {
        if(isset($this->files[$fileName]))
            return true;
        return false;
    }
}