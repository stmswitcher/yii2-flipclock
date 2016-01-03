# Countdown
To use FlipClock as countdown timer all you need to do is to set the `countdown` and the `time` parameters of the widget:
```php
use \stmswitcher\flipclock\FlipClock;
...
echo FlipClock::widget([
    'countdown' => true,
    'time'      => 120    //Countdown two minutes
]);
```

# Twelve / Twenty four hour clock
To set FlipClock to 12/24 hour format you have to use the `options` parameter:
```php
use \stmswitcher\flipclock\FlipClock;
...
echo FlipClock::widget([
    'options' => [
        'clockFace' => 'TwelveHourClock', // For 12-hour format, or
        'clockFace' => 'TwentyFourHourClock', // For 24-hour format
    ]
]);
```

The `options` parameter also could be used for any [FlipClock's options](http://flipclockjs.com/#options).

# Localization / i18n

For i18n purpose you could also use `options`:
```php
use \stmswitcher\flipclock\FlipClock;
...
echo FlipClock::widget([
    'options' => [
        'language' => 'de'
    ]
]);
```

# Custom time
To set FlipClock's custom time you should provide a proper time string to widget. It must contain hours, minutes, seconds and a period. `07:11:12 am` for example.
Here's an example of custom time usage:
```php
use \stmswitcher\flipclock\FlipClock;
...
echo FlipClock::widget([
    'custom_time' => '08:11:12 am',
    'options'     => [
        'language'  => 'de',
        'clockFace' => 'TwentyFourHourClock'
    ]
]);
```
