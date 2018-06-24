<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/05/2018
 * Time: 14:37
 */

namespace Core\Html;

class Header
{

	static $instance;
	private $meta = [];
	private $scripts = [];
	private $stylesheet = [];
	private $title = '';

	static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Header();
			return self::$instance;
		}
		return self::$instance;
	}

	public function addMetaTag($params)
	{
		$meta = '<meta ';
		foreach ($params as $key => $param)
		{
			$meta .= $key.'="'.$param.'"';
		}
		$meta .= '>';
		$this->meta[] = $meta;
	}

	public function addScript($url, $type = null)
	{
		$this->scripts[] = '<script src="'.$url.'" '.((!is_null($type)) ? 'type='.$type : '').'></script>';
	}

	public function addScriptDeclaration($script)
	{
		$this->scripts[] = '<script>'.$script.'</script>';
	}

	public function addStyleSheet($url, $rel = null, $type = null)
	{
		$this->stylesheet[] = '<link href="'.$url.'">';
	}

	public function addStyleSheetDeclaration($rules)
	{
		$this->stylesheet[] = '<style>'.$rules.'</style>';
	}

	public function setTitle($title)
	{
		$this->title = '<title>'.$title.'</title>';
	}

	public function parseHeaderDatas()
	{
		foreach ($this->meta as $meta)
		{
			echo $meta;
		}
		echo $this->title;
		foreach ($this->scripts as $script)
		{
			echo $script;
		}
		foreach ($this->stylesheet as $stylesheet)
		{
			echo $stylesheet;
		}
	}

}