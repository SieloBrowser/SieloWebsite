<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/06/2018
 * Time: 08:48
 */

namespace Core\Emitter;

class Emitter
{

	private $events = [];

	/**
	 * Emitter constructor.
	 */
	public function __construct()
	{



	}

	/**
	 * @param string|array $typeName
	 */
	public function addType($typeName)
	{
		if(is_array($typeName))
			foreach ($typeName as $type)
			{
				$this->events[$type] = [];
			}
		else
			$this->events[$typeName] = [];
	}

	/**
	 * @param string $eventName
	 * @param string $eventType
	 * @param $callback
	 */
	public function addEvent(string $eventName, $eventType, $callback)
	{



	}

	/**
	 *
	 */
	public function deleteEvent()
	{

	}

	/**
	 * @param string $eventName
	 */
	public function callEvent(string $eventName)
	{

	}

}