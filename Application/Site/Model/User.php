<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/05/2018
 * Time: 19:10
 */

namespace Application\Site\Model;

use Core\Database\QueryBuilder;
use Core\MVC\BaseModel;

class User extends BaseModel
{

	/**
	 * @var array
	 */
	private $_sessionParams = [];

	/**
	 * User constructor.
	 */
	public function __construct()
	{

		parent::__construct();
		$this->db = $this->getDb();

	}

	/**
	 * createAccount
	 *
	 * @param string $name
	 * @param string $surname
	 * @param string $pseudo
	 * @param string $password
	 * @param string $confirm
	 * @param string $email
	 *
	 * @return string
	 * @throws \Exception
	 */
	public function createAccount(string $name, string $surname, string $pseudo, string $password, string $confirm, string $email)
	{
		if($password === $confirm)
		{
			if($this->accountExists($pseudo, $email) === false)
			{
				$this->db->insert('`user`')->column(['name', 'surname', 'pseudo', 'password', 'email', 'registrationDate'])->values([':name', ':surname', ':pseudo', ':password', ':email', ':date']);
				$this->db->appendParameters([':name' => $name, ':surname' => $surname, ':pseudo' => $pseudo, ':password' => password_hash($password, PASSWORD_DEFAULT), ':email' => $email, ':date' => date('Y-m-d H:i:s')]);
				$this->db->execute();
				return 'Done';
			} else {
				return 'Already exists';
			}
		} else {
			return 'Password does not match';
		}
	}

	/**
	 * deleteAccount
	 *
	 * @param string $name
	 * @param string $confirm
	 */
	public function deleteAccount(string $name, string $confirm)
	{
		$this->db->select('*')->from('`user`')->execute();
		$accounts = $this->db->loadObjectList();
		foreach ($accounts as $account)
		{
			if($account->name === $name && password_verify($confirm, $account->password) === true) {
				return;
			}
		}
	}

	/**
	 * getAccount
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function getAccount($name)
	{
		if($name)
		{
			$this->db->select('*')->from('`user`')->where('`pseudo` = \''.$name.'\'');
			$account = $this->db->execute()->loadObjectList();
			$this->db->select('title')->from('usergroup_map')->join('inner', 'usergroups', 'usergroups.id = usergroup_map.usergroup')->where('`user` = \''.$name.'\'');
			$groups = $this->db->execute()->loadObjectList();
			$account[0]->usergroup = '';
			foreach ($groups as $group)
			{
				$account[0]->usergroup .= $group->title.', ';
			}
			$account[0]->usergroup = explode(', ', $account[0]->usergroup);
			return $account;
		}
	}

	/**
	 * accountExists
	 *
	 * @param string $pseudo
	 * @param string $email
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function accountExists($pseudo, $email)
	{
		if($pseudo && $email)
		{
			$this->db->select('`pseudo`, `email`')->from('`user`')->execute();
			$accounts = $this->db->loadObjectList();
			foreach ($accounts as $account)
			{
				if($pseudo === $account->pseudo && $email === $account->email)
				{
					return true;
				}
			}
			return false;
		} else {
			throw new \Exception('[AccountExists]: Name, Pseudo or email is not set');
		}
	}

	/**
	 * @param string $pseudo
	 * @param string $password
	 */
	public function login($pseudo, $password)
	{
		if($pseudo && $password)
		{
			$this->db->select('*')->from('`user`')->execute();
			$accounts = $this->db->loadObjectList();
			foreach ($accounts as $account)
			{
				if($pseudo === $account->pseudo && password_verify($password, $account->password))
				{
				    $_SESSION['isConnected'] = true;
				    return 'Done';
				} else {
				    return 'Account pseudo or password doesn\'t match';
                }
			}
		} else {
            return 'Account pseudo or password is not set';
		}
	}

	/**
	 * Disconnect
	 */
	public function disconnect()
	{
	    if(self::isConnected())
        {
			session_destroy();
		}
	}

	/**
	 * @param $param
	 */
	static public function setParam($paramName, $paramValue)
	{
		if(self::isConnected())
		{
			echo 'yes';
			$_SESSION[$paramName] = $paramValue;
		}
	}

	/**
	 * @param $paramName
	 */
	static public function deleteParam($paramName)
	{
		if(self::isConnected())
		{
			if(self::paramExists($paramName))
			{
				unset($_SESSION[$paramName]);
			}
		}
	}

	/**
	 * @param $paramName
	 *
	 * @return bool
	 */
	static public function paramExists($paramName)
	{
		if(key_exists($paramName, $_SESSION))
			return true;
		return false;
	}

	static public function isConnected()
	{
		if(self::sessionActive())
			return self::paramExists('isConnected');
	}

	/**
	 * @return bool
	 */
	static function sessionActive()
	{
		return session_status() === PHP_SESSION_ACTIVE;
	}

	/**
	 * @param $paramName
	 *
	 * @return mixed
	 */
	static function getParam($paramName)
	{
		if(self::isConnected())
		{
			if(self::paramExists($paramName))
				return $_SESSION[$paramName];
		}
	}
}