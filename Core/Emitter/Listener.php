<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/06/2018
 * Time: 08:34
 */

namespace Core\Emitter;


class Listener
{

	/**
	 * @var
	 */
	public $callback;
	/**
	 * @var
	 */
	public $priority;

	/**
	 * @var bool
	 */
	private $once = false;

	/**
	 * @var int
	 */
	private $calls = 0;

	/**
	 * @var bool
	 */
	public $stopPropagation = false;

	/**
	 * Listener constructor.
	 *
	 * @param callable $callback
	 * @param int      $priority
	 */
	public function __construct(callable $callback, int $priority)
	{
		$this->callback = $callback;
		$this->priority = $priority;
	}

	/**
	 * @param array $args
	 *
	 * @return mixed
	 */
	public function handle(array $args)
	{
		if ($this->once && $this->calls > 0)
		{
			return null;
		}
		$this->calls++;
		return call_user_func($this->callback, $args);
	}

	/**
	 * @param bool $once
	 *
	 * @return Listener
	 */
	public function once (): Listener
	{
		$this->once = true;
		return $this;
	}

	/**
	 *
	 */
	public function stopPropagation()
	{
		$this->stopPropagation = true;
		return $this;
	}

}