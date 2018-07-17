<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/05/2018
 * Time: 17:15
 */

namespace Core\Database;

use Core\Config\Config;

class Connector
{
	public static $_instance;
	private $params;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new Connector();
		}
		return self::$_instance;
	}

	protected function __construct()
	{
	    $config = Config::getInstance();
	    $config->setCacheExpirationTime(random_int(10, 3600));
	    $this->params = $config->getDbInformations();
	}

	public function getPDO()
	{
		try {
			$pdoStatement = new \PDO('mysql:dbname='.$this->params['dbName'].';host='.$this->params['dbHost'], $this->params['dbUser'], $this->params['dbUserPassword']);
		} catch(\PDOException $e)
		{
			throw new \DatabaseException('PDOError, connection not initalised: '.$e);
		}
		return $pdoStatement;
	}
}