<?php
namespace Rocketeer\Plugins\Hipchat;

use Hipchat\Support\ServiceProvider;
use Illuminate\Container\Container;
use Rocketeer\Plugins\AbstractNotifier;
use Rocketeer\Plugins\Notifier;

class RocketeerHipchat extends AbstractNotifier
{
	/**
	 * Setup the plugin
	 *
	 * @param Container $app
	 */
	public function __construct(Container $app)
	{
		parent::__construct($app);

		$this->configurationFolder = __DIR__.'/../config';
	}

	/**
	 * Bind additional classes to the Container
	 *
	 * @param Container $app
	 *
	 * @return void
	 */
	public function register(Container $app)
	{
		$provider = new ServiceProvider($app);
		$provider->register();
		$provider->boot();
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
		return $this->app['config']->get('rocketeer-hipchat::'.$message);
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
		$room  = $this->app['config']->get('rocketeer-hipchat::room') ?: $this->app['config']->get('hipchat::default');
		$color = $this->app['config']->get('rocketeer-hipchat::color') ?: $this->app['config']->get('hipchat::color');

		// Make the hipchat request.
		return $this->app['hipchat']->notifyIn($room, $message, $color);
	}
}
