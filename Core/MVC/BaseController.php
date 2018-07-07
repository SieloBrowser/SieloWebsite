<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/05/2018
 * Time: 10:13
 */

namespace Core\MVC;

use Core\Cache\Cache;
use Core\Emitter\Emitter;
use Core\Language\Lang;
use Core\Html\Document;

class BaseController
{
	/**
	 * @var BaseModel mixed
	 */
	protected $model;
//	/**
//	 * @var Cache Cache
//	 */
//	protected $cache;
	/**
	 * @var Lang
	 */
	protected $lang;
	/**
	 * @var Emitter
	 */
	protected $emitter;
	/**
	 * @var Document
	 */
	protected $htmlDocument;
	/**
	 * @var array
	 */
	private $params = [];
	/**
	 * @var string
	 */
	private $type;
	/**
	 * @var string
	 */
	private $defaultView = 'Default/default';
	/**
	 * @var string
	 */
	private $defaultlang = 'en';

//	/**
//	 * @var bool
//	 */
//	private $cacheActive = true;

	/**
	 * BaseController constructor.
	 *
	 * @param string $modelName
	 * @param string $type
	 */
	public function __construct(string $modelName, string $type)
	{
		$this->model = $this->getModel($modelName, $type);
		$this->htmlDocument = Document::getInstance();
		$this->type = $type;
		$this->emitter = Emitter::getInstance();
	}

	/**
	 * @param string $lang
	 * @param string $langFileName
	 * @param string $sitePart
	 */
	public function setLang(string $lang, string $langFileName, string $sitePart)
	{
		$this->lang = new Lang((isset($lang)) ? $lang : $this->defaultlang, $langFileName, $sitePart);
	}

	/**
	 * @param string $modelName
	 * @param string $type
	 *
	 * @return mixed
	 */
	private function getModel(string $modelName, string $type)
	{
		if($modelName && $type)
		{
			$modelPath = 'Application\\'.$type.'\\Model\\'.$modelName;

			return new $modelPath();
		} else {
			return null;
		}
	}

//	/**
//	 * @param bool $param
//	 */
//	protected function useCache(bool $param = true)
//	{
//		$this->cacheActive = $param;
//	}


	/**
	 * @param mixed       $param
	 * @param string|null $name
	 */
	public function setParam($param, string $name = null)
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

	/**
	 * @param string $viewName
	 */
	public function render(string $viewName, $cacheName = '')
	{
        ob_start();
        $this->params;
        $this->htmlDocument;
        require $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$viewName.'.php';
        $includedContent = ob_get_contents();
        ob_end_clean();
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$this->defaultView.'.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
//		if($this->cache->isExpired($viewName.$cacheName) === false && $this->cacheActive === true)
//		{
//			$this->cache->get($viewName.$cacheName);
//		} else {
//			ob_start();
//			$this->params;
//			$this->htmlDocument;
//			require $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$viewName.'.php';
//			$includedContent = ob_get_contents();
//			ob_end_clean();
//			ob_start();
//			require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/'.$this->type.'/View/'.$this->defaultView.'.php';
//			$content = ob_get_contents();
//			ob_end_clean();
//			if($this->cacheActive === true)
//				$this->cache->add($viewName.$cacheName, $content);
//			echo $content;
//		}
	}

}