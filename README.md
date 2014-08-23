# Hipchat for Rocketeer

Sends a basic deployment message to an Hipchat room.

To setup add this to your `composer.json` and update :

```json
"rocketeers/rocketeer-hipchat": "dev-master"
```

Then you'll need to set it up, so do `artisan config:publish rocketeer/rocketeer-hipchat` and complete the configuration in `app/packages/rocketeer/rocketeer-hipchat/config.php`.

Once that's done add the following to your providers array in `app/config/app.php` :

```php
'Rocketeer\Plugins\Hipchat\RocketeerHipchatServiceProvider',
```

And that's pretty much it.
