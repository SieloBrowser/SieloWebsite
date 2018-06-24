<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/05/2018
 * Time: 08:19
 */

namespace Application\Site\Model;


use Core\MVC\BaseModel;

class ThemeCreator extends BaseModel
{

	public function __construct() {
		parent::__construct();
		$this->db = $this->getDb();
	}

	public function createTheme($themeName, $shortDescription, $longDescription, $author)
	{
		if($this->themeExists($themeName) === false)
		{
			$this->db->insert('`themes`')->column(['name', 'shortDescription', 'longDescription', 'downloadUrl', 'author', 'creationDate', 'modificationDate'])->values([':name', ':shortDesc', ':longDesc', ':dlUrl', ':author', ':crDate', ':modifDate']);
			$this->db->appendParameters([':name' => $themeName, ':shortDesc' => $shortDescription, ':longDesc' => $longDescription, ':dlUrl' => '', ':author' => $author, ':crDate' => '', ':modifDate' => '']);
		}
	}

	public function editTheme()
	{

	}

	public function deleteTheme()
	{

	}

	public function themeExists($name)
	{
		if($name)
		{
			$this->db->select('`name`')->from('`themes`');
			$themes = $this->db->loadObjectList();
			foreach ($themes as $theme)
			{
				if($name === $theme->name)
				{
					return true;
				}
			}
			return false;
		} else {
			throw new \Exception('[ThemeExists] name is not set');
		}
	}

}