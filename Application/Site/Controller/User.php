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
	/**
	 * @var
	 */
	protected $lang;

	/**
	 * User constructor.
	 */
	public function __construct()
	{
		parent::__construct('User', 'Site');
		$this->setLang((\Application\Site\Model\User::isConnected()) ? $_SESSION['lang'] : 'en', 'User', 'Site');
	}

	/**
	 *
	 *
	 * @param array $infos
	 */
	public function createAccount($infos)
	{
	    /*
	     * Params
	     */
		$accountReturn = $this->model->createAccount($infos['name'], $infos['surname'], $infos['pseudo'], $infos['password'], $infos['confirm'], $infos['email']);

		$renderPage = 'User/join';
		if($accountReturn === 'Done')
		{
			$this->setParam($this->model->getAccount($infos['name']), 'account');
			$this->login($infos);
			header('Location: User/my');
		} else if($accountReturn === 'Already exists')
			$this->setParam($this->lang->getKey('ERROR_ACCOUNT_ALREADY_EXISTS'), 'returnError');
		else if($accountReturn === 'Password does not match')
			$this->setParam($this->lang->getKey('ERROR_PASSWORD_DOES_NOT_MATCH_CONFIRM'), 'returnError');
		$this->setParam($this->lang, 'lang');
		/*
		 * Render
		 */
		$this->render($renderPage);
		/*
		 * Emitter
		 */
        $this->emitter->emit('Account.created');
    }

	/**
	 * @param $infos
	 */
	public function login($infos)
	{
	    /*
	     * Emitter
	     */
        $this->emitter->emit('Account.onLogin');
	    /*
	     * Param
	     */
		$accountReturn = $this->model->login($infos['pseudo'], $infos['password']);
		if($accountReturn === 'Done')
        {
            $this->model->setParam('lang', 'en');
            $this->model->setParam('pseudo', $infos['pseudo']);
        } else if($accountReturn === 'Account pseudo or password doesn\'t match')
            $this->setParam($this->lang->getKey('ERROR_ACCOUNT_PSEUDO_OR_PASSWORD_DOESNT_MATCH', 'returnError'));
        else if($accountReturn === 'Account pseudo or password is not set')
            $this->setParam($this->lang->getKey('ERROR_ACCOUNT_PSEUDO_OR_PASSWORD_IS_NOT_SET', 'returnError'));
		/*
		 * Emitter
		 */
		$this->emitter->emit('Account.loginSuccessful');
	}

	/*
	 *
	 */
	public function disconnect()
	{
        $this->emitter->emit('Account.onDisconnect');
        $accountReturn = $this->model->disconnect();
        $this->emitter->emit('Account.disconnected');
    }

	public function invokeJoinPage()
	{
	    $this->emitter->emit('Render.onRender');
		$this->setParam($this->lang, 'lang');
		$this->render('User/join');
		$this->emitter->emit('Render.joinView');
	}

	/**
	 * @param $name
	 */
	public function invokeAccountPage($name)
	{
		$account = $this->model->getAccount($name);
        $this->setParam($this->lang, 'lang');
        if(count($account) !== 0)
		{
			$this->setParam($account[0], 'account');
			$this->htmlDocument->header->addMetaTag(['name' => 'testMeta']);
			$this->htmlDocument->header->setTitle($this->lang->getKey('ACCOUNT_PAGE_TITLE').' '.$name);
			$this->render('User/account');
			$this->emitter->emit('Render.account');
		} else {
			$this->render('Default/404');
		}
	}

	public function invokeMyPage()
    {
        if(\Application\Site\Model\User::isConnected())
        {
            $account = $this->model->getAccount(\Application\Site\Model\User::getParam('pseudo'));
            $this->setParam($this->lang, 'lang');
            if(count($account) !== 0)
            {

                $this->render('User/my');
                $this->emitter->emit('Render.myAccount');

            } else {
                $this->render('Default/404');
            }
        } else {
            header('Location: /Sielo/');
        }
    }
}