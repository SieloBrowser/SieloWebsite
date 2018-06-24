<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/05/2018
 * Time: 14:58
 */

namespace Core\Html;


class Body
{

	static $instance;

	static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Body();
			return self::$instance;
		}
		return self::$instance;
	}

	protected function __construct()
	{

	}

}