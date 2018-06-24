<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/05/2018
 * Time: 19:19
 */

namespace Application\Site\Controller;


use Core\MVC\BaseController;

class User extends BaseController
{
	protected $lang;

	public function __construct()
	{
		parent::__construct('User', 'Site');
		$this->setLang('en', 'User/page', 'Site');
	}

	public function invokeLoginPage()
	{

		if($this->model->isConnected())
		{
			echo 'already connected';
		} else {
			$this->render('User/login');
		}

	}

	public function invokeRegisterPage()
	{
		if($this->model->isConnected())
		{
			echo 'already connected';
		} else {
			$this->render('User/register');
		}
	}

	public function invokeAccountPage()
	{

	}

	public function invokeViewAccountPage($name)
	{

		$account = $this->model->getAccount($name);
		if(count($account) !== 0)
		{
			$this->setParams($account[0], 'account');
			$this->setParams($this->lang, 'lang');
			$this->htmlDocument->header->addMetaTag(['name' => 'testMeta']);
			$this->htmlDocument->header->setTitle($this->lang->getKey('ACCOUNT_PAGE_TITLE').' '.$name);
			$this->render('User/page');
		} else {
			$this->setParams($this->lang, 'lang');
			$this->render('Default/404');
		}

	}
}