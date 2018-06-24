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

	private $_sessionParams = [];

	public function __construct()
	{

		parent::__construct();
		$this->db = $this->getDb();

	}

	public function createAccount($name, $surname, $pseudo, $password, $confirm, $email)
	{
		if($password === $confirm && $this->accountExists($pseudo, $email) === false)
		{
			$this->db->insert('`user`')->column(['name', 'surname', 'pseudo', 'password', 'email'])->values([':name', ':pseudo', ':password', ':email']);
			$this->db->appendParameters([':name' => $name, ':surname' => $surname, ':pseudo' => $pseudo, ':password' => password_hash($password, PASSWORD_DEFAULT), ':email' => $email]);
			$this->db->execute();
		}
	}

	public function deleteAccount($name, $confirm)
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

	public function getAccount($name)
	{
		if($name)
		{
			$this->db->select('*')->from('`user`')->where('`pseudo` = \''.$name.'\'');
			$account = $this->db->execute()->loadObjectList();
			return $account;
		}
	}

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

	public function isConnected()
	{

	}

	public function login($name, $mdp)
	{

	}

	public function disconnect()
	{

	}

	public function changeInformation($info, $value)
	{

	}

	private function startSession()
	{

	}

	private function disconnectSession()
	{

	}

	public function setSessionParams($param)
	{

	}

}