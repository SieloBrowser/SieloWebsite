<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24/06/2018
 * Time: 18:26
 */

namespace Core\Cache;

class Cache
{

	private $cachePath;

	public function __construct($type)
	{

		$this->cachePath = 'Application/'.$type.'/Cache/';

	}

	public function add($file, $content)
	{
		file_put_contents($this->cachePath.$file.'.html', $content);
	}

	public function delete($fileName)
	{

	}

	public function isExpired($fileName)
	{
		$expireTime = time() - 3600;
		if (file_exists($this->cachePath.$fileName.'.html')  && filemtime($this->cachePath.$fileName.'.html') > $expireTime)
		{
			return false;
		} else {
			return true;
		}
	}

	public function get($fileName)
	{
		echo readfile($this->cachePath.$fileName.'.html');
	}

}