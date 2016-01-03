<?php

/**
 * Renders FlipClock
 * 
 * @var string $name
 * @var string $id
 * @var int $time
 * @var bool $countdown
 * @var bool|string $custom_time
 * @var array $options
 * @var \yii\web\View $this
 */

\stmswitcher\flipclock\assets\FlipClockAsset::register($this);

/**
 * Custom date
 * @var string
 */
$custom_date = null;

/**
 * JS variables
 * @var string
 */
$vars = "var $name;\n";

// Set custom date to use countdown
if ($countdown) {
    $custom_date = "dateDiff, ";
    $vars .= <<<JS
        var currDate = new Date();
        var dateDiff = currDate.getTime() + $time - currDate.getTime();
JS;
}

// Set custom time
if ($custom_time) {
    $vars .= "var customTime = new Date('2011-02-15 $custom_time');\n";
    $custom_date = "customTime, ";
}

// Build JS
$js = <<<JS
    $vars
    $(document).ready(function(){
        $name = $('#$id').FlipClock($custom_date{
            $options
        });
    });
JS;

$this->registerJs($js);
?>

<div id="<?= $id ?>"></div>