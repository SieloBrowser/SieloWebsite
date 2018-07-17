<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/07/2018
 * Time: 22:28
 */

namespace Core\File;


class IniFile extends File
{
    private $keys;

    public function __construct(string $path)
    {
        parent::__construct($path);
        $this->init();
    }

    public function getKey($keyName)
    {
        if($this->fileExists())
        {
            if(isset($this->keys))
            {
                if($this->keyExists($keyName))
                {
                    return $this->keys[$keyName];
                }
            } else {
                $this->init();
                $this->getKey($keyName);
            }
        } else {
            $this->createFile();
            $this->getKey($keyName);
        }
    }

    public function addKey($keyName, $value, $quote = true)
    {
        if($this->fileExists())
        {
            if(isset($this->keys))
            {
                if(!$this->keyExists($keyName))
                {
                    $this->keys[$keyName] = $value;
                    $content = '';
                    foreach ($this->keys as $key => $value)
                    {
                        $content .= $key.'='.$value."\n";
                    }
                    file_put_contents($this->filePath, $content);
                } else {
                    throw new FileException('[Fine: ini] => addKey: key '.$keyName.' already exists, if u want to modify it use the alterKey function');
                }
            } else {
                $this->init();
                $this->addKey($keyName, $value, $quote);
            }
        } else {
            $this->createFile();
            $this->addKey($keyName, $value, $quote);
        }
    }

    public function alterKey($keyName, $value, $quote = true)
    {
        if($this->fileExists())
        {
            if(isset($this->keys))
            {
                if($this->keyExists($keyName))
                {
                    $this->keys[$keyName] = $value;
                    $content = '';
                    foreach ($this->keys as $key => $value)
                    {
                        $content .= $key.'='.$value."\n";
                    }
                    file_put_contents($this->filePath, $content);
                } else {
                    throw new FileException('[Fine: ini] => addKey: key '.$keyName.' don\'t exist');
                }
            } else {
                $this->init();
                $this->alterKey($keyName, $value, $quote);
            }
        } else {
            $this->createFile();
            $this->alterKey($keyName, $value, $quote);
        }
    }

    public function deleteKey($keyName)
    {
        if($this->fileExists())
        {
            if(isset($this->keys))
            {
                if($this->keyExists($keyName))
                {
                    unset($this->keys[$keyName]);
                    $content = '';
                    foreach ($this->keys as $key => $value)
                    {
                        $content .= $key.'='.$value."\n";
                    }
                    file_put_contents($this->filePath, $content);
                } else {
                    throw new FileException('[File: ini] => deleteKey: key '.$keyName.' don\'t exist');
                }
            } else {
                $this->init();
                return;
            }
        } else {
            $this->createFile();
            return;
        }
    }

    protected function keyExists($keyName)
    {
        return isset($this->keys[$keyName]);
    }

    protected function init()
    {
        $this->keys = parse_ini_file($this->filePath);
    }
}