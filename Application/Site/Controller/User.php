<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/05/2018
 * Time: 19:19
 */

namespace Application\Site\Controller;

use Core\Cookie\Cookie;
use Core\MVC\BaseController;
use Core\Session\Session;

class User extends BaseController
{
	/**
	 * User constructor.
	 */
	public function __construct()
	{
		parent::__construct( 'Site');
        $lang = (Session::isConnected() == true) ? $_SESSION['lang'] : ((Cookie::cookieExists('lang') == true) ? Cookie::getCookie('lang') : 'en');
        $this->setLang($lang, 'Site');
        $this->lang->addFile('User');
        $this->loadModel('User');
	}

	/**
	 *
	 *
	 * @param array $infos
	 */
	public function createAccount($infos)
	{
        /*
         * Emitter
         */
        $this->emitter->emit('Account.onCreate');
	    /*
	     * Account creation
	     */
		$accountReturn = $this->User->createAccount($infos['name'], $infos['surname'], $infos['nickname'], $infos['password'], $infos['confirm'], $infos['email']);
        /*
         * Emitter
         */
        $this->emitter->emit('Account.created');

        /*
         * Render & Params
         */
        if($accountReturn === 'Done')
		{
		    $this->User->login($infos['$nickname'], $infos['password']);
		    header('Location: /Sielo/account/my');
		    return;
		} else if($accountReturn === 'Already exists')
			$this->setParam($this->lang->getKey('JOIN_ERROR_ACCOUNT_ALREADY_EXISTS'), 'returnError');
		else if($accountReturn === 'Password does not match')
			$this->setParam($this->lang->getKey('JOIN_ERROR_PASSWORD_DOES_NOT_MATCH_CONFIRM'), 'returnError');
		$this->setParam(['$nickname' => $infos['$nickname'], 'name' => $infos['name'], 'surname' => $infos['surname'], 'email' => $infos['email']], 'returnInformations');
        $this->setParam('register', 'typeOf'); // Typeof
        $this->setParam($this->lang, 'lang'); // Lang
		$this->render('User/join');
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
         * Account login
         */
        $accountReturn = $this->User->login($infos['nickname'], $infos['password']);
        /*
		 * Emitter
		 */
        $this->emitter->emit('Account.loginSuccessful');
        /*
         * Render & Params
         */
		if($accountReturn === 'Done')
        {
            Session::setParam('lang', (Cookie::cookieExists('lang')) ? Cookie::getCookie('lang') : 'en' );
            Session::setParam('nickname', $infos['nickname']);
            header('Location: /Sielo/account/my');
            return;
        } else if($accountReturn === 'Account nickname doesn\'t exists')
        {
            $this->setParam($this->lang->getKey('JOIN_ERROR_ACCOUNT_PASSWORD_DOESNT_MATCH'), 'returnError');
        } else if($accountReturn === 'Account password doesn\'t match') {
            $this->setParam($this->lang->getKey('JOIN_ERROR_ACCOUNT_NICKNAME_DOESNT_EXIST'), 'returnError');
        } else if($accountReturn === 'Account nickname or password is not set')
        {
            $this->setParam($this->lang->getKey('JOIN_ERROR_ACCOUNT_NICKNAME_OR_PASSWORD_IS_NOT_SET'), 'returnError');
        }
        $this->setParam(['nickname' => $infos['nickname']], 'returnInformations');
        $this->setParam('login', 'typeOf'); // Typeof
        $this->setParam($this->lang, 'lang'); // Lang
        $this->render('User/join');
	}

	public function changeImage($informations)
    {
        var_dump($informations);
    }

    public function changeNickname($informations)
    {

    }

    public function changePassword($informations)
    {

    }

	/*
	 *
	 */
	public function disconnect()
	{
        $this->emitter->emit('Account.onDisconnect');
        Session::disconnect();
        $this->emitter->emit('Account.disconnected');
        header('Location: /Sielo/');
    }

    public function lang($lang)
    {
        if(Session::isConnected())
        {
            Session::setParam('lang', $lang);
        } else {
            if(Cookie::cookieExists('lang'))
                Cookie::deleteCookie('lang');
            Cookie::addCookie('lang', $lang, 60*10, '/');
        }
        header('Location: /Sielo/');
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
		$account = $this->User->getAccount($name);
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
        if(Session::isConnected())
        {
            $account = $this->User->getAccount(Session::getParam('nickname'));
            $this->setParam($this->lang, 'lang');
            if(count($account) !== 0)
            {
                $this->setParam($account[0], 'account');
                $this->render('User/my');
                $this->emitter->emit('Render.myAccount');
            } else {
                $this->render('Default/404');
            }
        } else {
            header('Location: /Sielo/');
        }
    }

    public function invokeLangPage()
    {
        $this->setParam($this->lang, 'lang');
        $this->render('User/lang');
    }
}