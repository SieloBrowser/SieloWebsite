<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/06/2018
 * Time: 17:41
 */

namespace Application\Site\Controller;


use Core\MVC\BaseController;

class Home extends BaseController
{

	protected $lang;

	public function __construct()
	{

		parent::__construct('', 'Site');

	}

	public function invokeHomePage()
	{
		$this->render('Home/home');
	}

	public function invokeDownloadPage()
	{

	}

}