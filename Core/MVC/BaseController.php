<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/05/2018
 * Time: 10:13
 */

namespace Core\MVC;

use Core\Cache\Cache;
use Core\Language\Lang;
use Core\Html\Document;

class BaseController
{
	protected $model;
	protected $cache;
	protected $lang;
	protected $htmlDocument;
	private $params = [];
	private $type;
	private $defaultView = 'Default/default';
	private $defaultlang = 'fr';
	private $cacheActive = true;

	public function __construct($modelName, $type)
	{
		$this->model = $this->getModel($modelName, $type);
		$this->cache = new Cache($type);
		$this->htmlDocument = Document::getInstance();
		$this->type = $type;
	}

	public function setLang($lang, $langFileName, $sitePart)
	{
		$this->lang = new Lang((isset($lang)) ? $lang : $this->defaultlang, $langFileName, $sitePart);
	}

	private function getModel($modelName, $type)
	{
		$modelPath = 'Application\\'.$type.'\\Model\\'.$modelName;

		return new $modelPath();
	}

	protected function useCache(bool $param = true)
	{
		$this->cacheActive = $param;
	}

	public function setParams($param, $name = null)
	{
		if(is_array($param) && is_array($name))
		{
			foreach ($param as $key => $item)
			{
				$this->params[$name[$key]] = $item;
			}
		} else if(isset($name)) {
			$this->params[$name] = $param;
		} else {
			$this->params = $param;
		}
	}

	public function render($viewName)
	{
		if($this->cache->isExpired($viewName) === false && $this->cacheActive === true)
		{
			$this->cache->get($viewName);
		} else {
			ob_start();
			$this->params;
			$this->htmlDocument;
			require $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$viewName.'.php';
			$includedContent = ob_get_clean();
			require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$this->defaultView.'.php';
			$content = ob_get_contents();
			ob_end_clean();
			if($this->cacheActive === true)
				$this->cache->add($viewName, $content);
			echo $content;
		}
	}

}