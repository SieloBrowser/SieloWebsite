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
		$this->setLang('en', 'User', 'Site');
	}

	public function createAccount($infos)
	{
		$accountReturn = $this->model->createAccount($infos['name'], $infos['surname'], $infos['pseudo'], $infos['password'], $infos['confirm'], $infos['email']);

		$renderPage = 'User/register';
		if($accountReturn === 'Done')
		{
			$this->setParams($this->model->getAccount($infos['name']), 'account');
			$renderPage = 'User/page';
		} else if($accountReturn === 'Already exists' )
		{
			$this->setParams($this->lang->getKey('ERROR_ACCOUNT_ALREADY_EXISTS'), 'returnError');
		} else if($accountReturn === 'Password does not match')
		{
			$this->setParams($this->lang->getKey('ERROR_PASSWORD_DOES_NOT_MATCH_CONFIRM'), 'returnError');
		}
		$this->setParams($this->lang, 'lang');
		$this->render($renderPage);
	}

	public function login($infos)
	{
		$this->useCache(false);
		$accountReturn = $this->model->login($infos['pseudo'], $infos['password']);
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
			$this->setParams($this->lang, 'lang');
			$this->render('User/register');
		}
	}

	public function invokeAccountPage()
	{

	}

	public function invokeViewAccountPage($name)
	{
		$this->useCache(false);
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