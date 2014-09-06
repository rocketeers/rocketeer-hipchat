<?php
namespace Rocketeer\Plugins\Hipchat;

use Illuminate\Support\ServiceProvider;
use Rocketeer\Facades\Rocketeer;

/**
 * Register the Hipchat plugin with the Laravel framework and Rocketeer
 */
class RocketeerHipchatServiceProvider extends ServiceProvider
{
	/**
	 * Register classes
	 *
	 * @return void
	 */
	public function register()
	{
		$serviceProvider = $this->app->make('Hipchat\Support\ServiceProvider', [$this->app]);
		$serviceProvider->register();

		$this->app->bind(
			'Rocketeer\Plugins\Hipchat\RocketeerHipchat',
			function () {
				// Create a hipchat notifier.
				$hipchat = $this->app['hipchat'];

				// Get some config.
				$config = $this->app['config'];
				$room = $config->get('rocketeer-hipchat::room');
				$color = $config->get('rocketeer-hipchat::color');
				$messages = $config->get('rocketeer-hipchat::messages');

				// Create the plugin.
				return new RocketeerHipchat($hipchat, $room, $color, $messages);
			}
		);
	}

	/**
	 * Boot the plugin
	 *
	 * @return void
	 */
	public function boot()
	{
		$config = $this->app['config'];
		$package = 'rocketeers/rocketeer-hipchat';

		$config->package($package,
			base_path() . '/vendor/'. $package .'/src/config'
		);

		if ($this->app['config']->get('rocketeer-hipchat::enabled')) {
			$this->app['rocketeer.tasks']->plugin('Rocketeer\Plugins\Hipchat\RocketeerHipchat');
		}
	}
}
