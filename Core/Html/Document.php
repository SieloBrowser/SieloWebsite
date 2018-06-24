<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/05/2018
 * Time: 14:58
 */

namespace Core\Html;


class Document
{

	static $instance;
	public $header;
	public $body;

	static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Document();
			return self::$instance;
		}
		return self::$instance;
	}

	protected function __construct()
	{
		$this->header = Header::getInstance();
		$this->body= Body::getInstance();
	}
}