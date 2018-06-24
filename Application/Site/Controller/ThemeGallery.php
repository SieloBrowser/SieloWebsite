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
		$this->setLang('en', 'Theme/gallery', 'Site');
	}

	public function invokeListing()
	{
		$this->setParams($this->model->getThemes(), 'themes');
		$this->render('Theme/listing');
	}

	public function invokeThemePage($name)
	{
		$this->setParams($this->model->getTheme($name));
		$this->setParams($this->lang, 'lang');
		$this->render('Theme/page');
	}
}