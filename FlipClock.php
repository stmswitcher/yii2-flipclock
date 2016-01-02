<?php

namespace stmswitcher\flipclock;

/**
 * Wrapper of FlipClock {@see http://flipclockjs.com/} for Yii2
 *
 * @namespace stmswitcher\flipclock
 * @file      FlipClock.php
 * 
 * @author Denis Alexandrov <stm.switcher@gmail.com>
 * @date   03.01.2016 00:01:19
 */

class FlipClock extends \yii\base\Widget
{
    /** @var string Name of FlipClock instance */
    public $name = 'flipclock';
    
    /** @var string ID selector to place FlipClock */
    public $id = 'flipclock';
    
    /** @var int Time */
    public $time = 120;
    
    /** @var array Additional options for FlipClock */
    public $options = [];
    
    public function init()
    {
        if (!empty($this->options))
            $this->optionsToJS();
        else
            $this->options = null;
    }
    
    public function run()
    {
        return $this->render('flipclock', [
            'name'    => $this->name,
            'id'      => $this->id,
            'time'    => $this->time,
            'options' => $this->options,
        ]);
    }
    
    /**
     * Build JS-options array
     */
    private function optionsToJS()
    {
        $options = [];
        foreach ($this->options as $option => $value) {
            $options[] = "$option: '$value'";
        }
        $this->options = implode(",\n", $options);
    }
}
