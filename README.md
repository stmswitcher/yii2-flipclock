# yii2-flipclock
This is a wrapper extension of [FlipClock.js](http://flipclockjs.com/) for [Yii2](http://yiiframework.com/).

# Installation
The preferred way to install this extension is to use [composer](http://getcomposer.org/):
```
composer require "stmswitcher/yii2-flipclock" "dev-master"
```

# Basic usage

To output a single instance of FlipClock:
````php
use \stmswitcher\flipclock\FlipClock;
...
<div class="somewrapper">
    <?= FlipClock::widget() ?>
</div>
```
Check [EXAMPLE.md](https://github.com/stmswitcher/yii2-flipclock/blob/master/EXAMPLE.md) for more info.
