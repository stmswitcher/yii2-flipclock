<?php

/**
 * Renders FlipClock
 * 
 * @var string $name
 * @var string $id
 * @var int $time
 * @var array $options
 */

\stmswitcher\flipclock\assets\FlipClockAsset::register($this);

$js = <<<JS
    var $name;
    $(document).ready(function(){
        $name = $('#$id').FlipClock({
            $options
        });
    });
JS;

$this->registerJs($js);
?>

<div id="<?= $id ?>"></div>