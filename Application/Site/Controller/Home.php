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
		$this->setLang((\Application\Site\Model\User::isConnected()) ? $_SESSION['lang'] : 'en', 'Home', 'Site');

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
        $userModel = new \Application\Site\Model\User();
        $account = $userModel->getAccount($_SESSION['pseudo']);
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

	public function invokePresentationPage($forced = false)
    {
        /*
         * Meta & title
         */
        $this->htmlDocument->header->setTitle($this->lang->getKey('PRESENTATION_PAGE_TITLE'));
        /*
         * View params
         */
        if($forced)
            $this->setParam(true, 'forced');
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