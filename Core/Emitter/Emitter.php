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

	/**
	 * @var
	 */
	private static $_instance;
	/**
	 * @var Listener[][]
	 */
	private $listeners = [];

	/**
	 * @return Emitter
	 */
	public static function getInstance(): Emitter
	{

		if(!isset(self::$_instance))
		{
			self::$_instance = new Emitter();
		}

		return self::$_instance;
	}

	/**
	 * @param string $event
	 * @param mixed  ...$args
	 */
	public function emit(string $event, ...$args)
	{
		if($this->hasListener($event))
		{
			foreach ($this->listeners[$event] as $listener)
			{
				$listener->handle($args);
				if($listener->stopPropagation)
				{
					break;
				}
			}
		}
	}

	/**
	 * @param string   $event
	 * @param callable $callable
	 * @param int $priority
	 *
	 * @return Listener
	 */
	public function on(string $event, callable $callable, int $priority = 0) : Listener
	{
		if(!$this->hasListener($event))
		{
			$this->listeners[$event] = [];
		}
		$this->callableExistsForEvent($event, $callable);
		$listener = new Listener($callable, $priority);
		$this->listeners[$event][] = $listener;
		$this->sortListeners($event);
		return $listener;
	}

	/**
	 * @param string   $event
	 * @param callable $callable
	 * @param int      $priority
	 *
	 * @return Listener
	 */
	public function once(string $event, callable $callable, int $priority = 0) : Listener
	{

		return $this->on($event, $callable, $priority)->once();

	}

	/**
	 * @param string $event
	 *
	 * @return bool
	 */
	private function hasListener(string $event): bool {
		return array_key_exists($event, $this->listeners);
	}

	/**
	 * @param $event
	 */
	private function sortListeners($event)
	{
		uasort($this->listeners[$event], function($a, $b) {
			return $a->priority < $b->priority;
		});
	}

	private function callableExistsForEvent(string $event, callable $callback): bool
	{

		foreach ($this->listeners[$event] as $listener)
		{
			if($listener->callback === $callback)
			{
				throw new EventException();
			}
		}
		return false;
	}
}