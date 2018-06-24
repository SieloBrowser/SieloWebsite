<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/05/2018
 * Time: 11:07
 */

namespace Core\UrlRouter;

class RouterException extends \Exception
{
	public function __construct($message = "", $code = 0, \Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}