<?php

namespace stmswitcher\flipclock\assets;

/**
 * FlipClock assets
 *
 * @namespace stmswitcher/flipclock/assets
 * @file      FlipClockAsset.php
 * 
 * @author Denis Alexandrov <stm.switcher@gmail.com>
 * @date   03.01.2016 00:06:42
 */

class FlipClockAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/stmswitcher/yii2-flipclock/assets/flipclock';
    public $css = [
        'flipclock.css',
    ];
    public $js = [
        'flipclock.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
