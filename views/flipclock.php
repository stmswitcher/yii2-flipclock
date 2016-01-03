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
 */

\stmswitcher\flipclock\assets\FlipClockAsset::register($this);

/** @var string countdown code */
$cd = null;

/** @var string js vars */
$vars = "var $name;\n";

if ($countdown) {
    $cd = "dateDiff, ";
    $vars .= <<<JS
        var currDate = new Date();
        var dateDiff = currDate.getTime() + $time - currDate.getTime();
JS;
}

if ($custom_time) {
    $vars .= "var customTime = new Date('2011-02-15 $custom_time');\n";
    $cd = "customTime, ";
}

$js = <<<JS
    $vars
    $(document).ready(function(){
        $name = $('#$id').FlipClock($cd{
            $options
        });
    });
JS;

$this->registerJs($js);
?>

<div id="<?= $id ?>"></div>