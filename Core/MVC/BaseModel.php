<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/05/2018
 * Time: 10:13
 */

namespace Core\MVC;

use Core\Database\QueryBuilder;

class BaseModel
{
	protected $db;

	public function __construct()
	{
		$this->db = $this->getDb();
	}

	public function getDb()
	{
		return new QueryBuilder();
	}
}