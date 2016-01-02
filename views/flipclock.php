<?php

/**
 * Renders FlipClock
 * 
 * @var string $name
 * @var string $id
 * @var int $time
 * @var bool $countdown
 * @var array $options
 */

\stmswitcher\flipclock\assets\FlipClockAsset::register($this);

/** @var string countdown code */
$cd = null;

/** @var string js vars */
$vars = <<<JS
    var $name;
JS;

if ($countdown) {
    $cd = "dateDiff, ";
    $vars .= <<<JS
        var currDate = new Date();
        var dateDiff = currDate.getTime() + $time - currDate.getTime();
JS;
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