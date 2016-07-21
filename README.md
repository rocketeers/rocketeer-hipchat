# Hipchat for Rocketeer

Sends a basic deployment message to an Hipchat room.

## Installation

```shell
rocketeer plugin:install anahkiasen/rocketeer-hipchat
```

Then add this to the `plugins.loaded` array in your configuration:

```php
<?php
'loaded' => [
    'Rocketeer\Plugins\Hipchat\RocketeerHipchat',
],
```
