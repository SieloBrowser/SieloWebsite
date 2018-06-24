<?php

namespace Core\Autoloader;

class Register
{
	public static $_instance;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new Register();
		}
		return self::$_instance;
	}

	protected function __construct()
	{

		$this->register();

	}

	private function register()
	{

		spl_autoload_register([__CLASS__, 'load']);

	}

	private function load($className)
	{

		if(strpos($className, 'Core') === 0)
		{

			$className = str_replace('Core\\', '', $className);
			require_once $_SERVER['DOCUMENT_ROOT'].'\\Sielo\\Core\\'.$className.'.php';

		} else if(strpos($className,'App') === 0)
		{

			$className = str_replace('Application\\', '', $className);
			require_once $_SERVER['DOCUMENT_ROOT'].'\\Sielo\\Application\\'.$className.'.php';

		}

	}
}