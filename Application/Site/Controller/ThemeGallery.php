<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/05/2018
 * Time: 17:17
 */

namespace Application\Site\Controller;
use Core\MVC\BaseController;
use Core\Language\Lang;

class ThemeGallery extends BaseController {

	public function __construct()
	{
		parent::__construct('ThemeGallery', 'Site');
		$this->setLang('en', 'Theme', 'Site');
	}

	public function invokeListing()
	{
		$this->setParam($this->model->getThemes(), 'themes');
		$this->render('Theme/listing');
	}

	public function invokeThemePage($name)
	{
		$this->setParam($this->model->getTheme($name));
		$this->setParam($this->lang, 'lang');
		$this->render('Theme/page');
	}
}