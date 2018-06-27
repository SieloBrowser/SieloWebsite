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
	 * @return string bool
	 */
	public function isConnected()
	{
		return isset($_SESSION);
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
					$this->startSession($account);
				}
			}
		} else {

		}
	}

	/**
	 *
	 */
	public function disconnect()
	{

	}

	/**
	 * @param $info
	 * @param $value
	 */
	public function changeInformation($info, $value)
	{

	}

	/**
	 *
	 */
	private function startSession()
	{
		session_start();
		$_SESSION['lang'] = 'en';
	}

	/**
	 *
	 */
	private function disconnectSession()
	{
		session_destroy();
	}

	/**
	 * @param $param
	 */
	public function setSessionParams($param)
	{

	}

	/**
	 * @return bool
	 */
	static function sessionStarted()
	{
		return session_status() === PHP_SESSION_ACTIVE;
	}

	/**
	 * @param $paramName
	 */
	static function getSessionParam($paramName)
	{
		if(self::sessionStarted())
		{

		}
	}

}