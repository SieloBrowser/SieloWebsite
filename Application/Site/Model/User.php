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
use Core\Session\Session;

class User extends BaseModel
{
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
	 * @param string $nickname
	 * @param string $password
	 * @param string $confirm
	 * @param string $email
	 *
	 * @return string
	 * @throws \Exception
	 */
	public function createAccount(string $name, string $surname, string $nickname, string $password, string $confirm, string $email)
	{
		if($password === $confirm)
		{
			if($this->accountExists($nickname, $email) === false)
			{
				$this->db->insert('`user`')->column(['name', 'surname', 'nickname', 'password', 'email', 'registrationDate'])->values([':name', ':surname', ':nickname', ':password', ':email', ':date']);
				$this->db->appendParameters([':name' => $name, ':surname' => $surname, ':nickname' => $nickname, ':password' => password_hash($password, PASSWORD_DEFAULT), ':email' => $email, ':date' => date('Y-m-d H:i:s')]);
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
			$this->db->select('*')->from('`user`')->where('`nickname` = \''.$name.'\'');
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
	 * @param string $nickname
	 * @param string $email
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function accountExists($nickname, $email)
	{
		if($nickname && $email)
		{
			$this->db->select('`nickname`, `email`')->from('`user`')->execute();
			$accounts = $this->db->loadObjectList();
			foreach ($accounts as $account)
			{
				if($nickname === $account->nickname && $email === $account->email)
				{
					return true;
				}
			}
			return false;
		} else {
			throw new \Exception('[AccountExists]: Name, Nickname or email is not set');
		}
	}

	/**
	 * @param string $nickname
	 * @param string $password
     *
     * @return string
	 */
	public function login($nickname, $password)
	{
		if($nickname && $password)
		{
			$this->db->select('*')->from('`user`')->execute();
			$accounts = $this->db->loadObjectList();
			foreach ($accounts as $account)
			{
                if($nickname === $account->nickname)
                {
				    if(password_verify($password, $account->password))
                    {
                        Session::connect();
                        return 'Done';
                    } else {
				        return 'Account password doesn\'t match';
                    }
				}
			}
            return 'Account nickname doesn\'t exists';
        } else {
            return 'Account nickname or password is not set';
		}
	}
}