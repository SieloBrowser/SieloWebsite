<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/05/2018
 * Time: 17:09
 */

namespace Application\Site\Model;


use Core\MVC\BaseModel;

class ThemeGallery extends BaseModel
{

	public function __construct() {
		parent::__construct();
		$this->db = $this->getDb();
	}

	public function getThemes()
	{
		$this->db->select('*')->from('`themes`');
		$this->db->execute();
		return $this->db->loadObjectList();
	}

	public function getTheme($name)
	{
		$this->db->select('*')->from('`themes`')->where('`name` = \''.$name.'\'')->execute();
		$theme = $this->db->loadObjectList();
		$this->db->select('*')->from('`themes_comments`')->where('`template` = \''.$name.'\'')->execute();
		$comments = $this->db->loadObjectList();
		return [$theme,$comments];
	}
}