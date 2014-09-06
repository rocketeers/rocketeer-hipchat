<?php
namespace Rocketeer\Plugins\Hipchat;

use Rocketeer\Plugins\AbstractNotifier;
use Hipchat\Notifier as Hipchat;

class RocketeerHipchat extends AbstractNotifier
{
	/**
	 * @var Hipchat
	 */
	protected $hipchat;

	/**
	* @var array
	*/
	protected $messages;

	/**
	* @var string
	*/
	protected $room;

	/**
	* @var string
	*/
	protected $color;

	/**
	 * Setup the plugin
	 *
	 * @param Container $app
	 * @param string $room
	 * @param string $color
	 * @param array $messages
	 */
	public function __construct(Hipchat $hipchat, $room, $color, $messages)
	{
		$this->hipchat = $hipchat;
		$this->room = $room;
		$this->color = $color;
		$this->messages = $messages;
	}

	/**
	 * Get the default message format
	 *
	 * @param string $message The message handle
	 *
	 * @return string
	 */
	public function getMessageFormat($message)
	{
		return $this->messages[$message];
	}

	/**
	 * Send a given message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function send($message)
	{
		return $this->hipchat->notifyIn($this->room, $message, $this->color);
	}
}
