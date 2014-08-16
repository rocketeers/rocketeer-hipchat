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
    // ...
  }

  /**
   * Boot the plugin
   *
   * @return void
   */
  public function boot()
  {
	  if ($this->app['config']->get('rocketeer-hipchat::enabled')) {
		  $this->app['rocketeer.tasks']->plugin('Rocketeer\Plugins\Hipchat\RocketeerHipchat');
	  }
  }
}
