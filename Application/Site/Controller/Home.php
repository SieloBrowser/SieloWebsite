<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27/06/2018
 * Time: 17:41
 */

namespace Application\Site\Controller;


use Core\Cookie\Cookie;
use Core\MVC\BaseController;
use Core\Session\Session;

class Home extends BaseController
{

	public function __construct()
	{

		parent::__construct('Site');
        $lang = (Session::isConnected() == true) ? $_SESSION['lang'] : ((Cookie::cookieExists('lang') == true) ? Cookie::getCookie('lang') : 'en');
        $this->setLang($lang, 'Home', 'Site');
        $this->loadModel('User');
	}

	public function invokeHomePage()
	{
	    /*
	     * Meta & title
	     */
	    $this->htmlDocument->header->setTitle($this->lang->getKey('HOME_PAGE_TITLE'));
	    /*
	     * View params
	     */
        $account = $this->User->getAccount($_SESSION['nickname']);
        $this->setParam($account[0], 'account');
        $this->setParam($this->lang, 'lang');
        /*
         * Render
         */
        $this->render('Home/home');
        /*
         * Emitter
         */
        $this->emitter->emit('Home.viewHome');
	}

	public function invokePresentationPage()
    {
        /*
         * Meta & title
         */
        $this->htmlDocument->header->setTitle($this->lang->getKey('PRESENTATION_PAGE_TITLE'));
        /*
         * View params
         */
        $this->setParam($this->lang, 'lang');
        /*
         * Render
         */
        $this->render('Home/presentation');
        /*
         * Emitter
         */
        $this->emitter->emit('Home.viewPresentation');
    }
}