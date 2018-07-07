<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/05/2018
 * Time: 14:58
 */

namespace Core\Html;


class Body
{

	static $instance;

	private $specificHtmlVar = [];

	static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Body();
			return self::$instance;
		}
		return self::$instance;
	}

	protected function __construct()
	{

	}

	public function generateSpecificHtmlVar($name, $html)
    {
        if(!$this->specificHtmlVarExists($name))
            $this->specificHtmlVar[$name] = $html;
    }

    public function getSpecificHtmlVar($name)
    {
        if($this->specificHtmlVarExists($name))
            return $this->specificHtmlVar[$name];
        else
            return false;
    }

    private function specificHtmlVarExists($name)
    {
        if(isset($this->specificHtmlVar[$name]))
            return true;
        return false;
    }

}