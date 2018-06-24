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
	private $sitePart;
	private $fileName;
	public $commonLangFile;
	public $defaultLangFile;

	public function __construct($lang, $fileName, $sitePart)
	{
		$this->lang = $lang;
		$this->fileName = $fileName;
		$this->sitePart = $sitePart;
		$this->getLangFile();
	}

	public function getKey($keyName)
	{
		for($i = 1; $i <= 2; $i++)
		{
			if($i === 1)
				$file = $this->defaultLangFile;
			else
				$file = $this->commonLangFile;
			while (($buffer = fgets($file)) !== false)
			{
				$currentKey = substr($buffer, 0, strpos($buffer, '='));
				if(strpos($buffer, $keyName) !== false && strlen($keyName) === strlen($currentKey))
				{
					$start = strpos($buffer, '=');
					$start++;
					$value = substr($buffer, $start, strlen($buffer));

					fseek($this->commonLangFile, 0);
					fseek($this->defaultLangFile, 0);
					return $value;
				}
			}
		}

		fseek($this->commonLangFile, 0);
		fseek($this->defaultLangFile, 0);
		return false;
	}

	private function getLangFile()
	{
		$commonLangFile = fopen($_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->sitePart.'/Langs/'.$this->lang.'/'.$this->fileName.'.ini', 'r');
		$defaultLangFile = fopen($_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->sitePart.'/Langs/'.$this->lang.'/default.ini', 'r');
		$this->commonLangFile = $commonLangFile;
		$this->defaultLangFile = $defaultLangFile;
	}
}