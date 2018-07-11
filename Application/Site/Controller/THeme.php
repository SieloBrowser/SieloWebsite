<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/07/2018
 * Time: 11:38
 */

namespace Application\Site\Controller;

use Core\Cookie\Cookie;
use Core\MVC\BaseController;
use Core\Session\Session;

class Theme extends BaseController
{

    public function __construct()
    {
        parent::__construct('Site');
        $lang = (Session::isConnected() == true) ? $_SESSION['lang'] : ((Cookie::cookieExists('lang') == true) ? Cookie::getCookie('lang') : 'en');
        $this->setLang($lang, 'User', 'Site');
        $this->loadModel('Theme');
    }


    public function invokeThemeListing()
    {

        

    }

}