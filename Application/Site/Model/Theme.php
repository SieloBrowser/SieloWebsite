<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/07/2018
 * Time: 11:33
 */

namespace Application\Site\Model;


use Core\MVC\BaseModel;

class Theme extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDb();
    }

    public function getTheme($themeName)
    {

    }

    public function getThemes()
    {

    }

    public function addTheme()
    {

    }

    public function deleteTheme()
    {

    }
}