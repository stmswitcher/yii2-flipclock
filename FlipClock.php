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
    
    /** @var string ID selector for FlipClock div */
    public $id;
    
    /** @var int Time */
    public $time = 120;
    
    /** @var bool Display days */
    public $daily = true;
    
    /** @var bool Use as countdown */
    public $countdown = false;
    
    /** @var string|bool Custom time */
    public $custom_time = false;
    
    /** @var array Additional options for FlipClock */
    public $options = [];
    
    public function init()
    {
        if (!$this->id)
            $this->id = $this->name;
        
        if ($this->custom_time)
            $this->checkTime();
        
        if ($this->daily && !isset($this->options['clockface']))
            $this->options['clockface'] ='DailyCounter';
        
        if ($this->countdown)
            $this->options['countdown'] = 'true';
        
        if (!empty($this->options))
            $this->optionsToJS();
        else
            $this->options = null;
    }
    
    public function run()
    {
        return $this->render('flipclock', [
            'name'        => $this->name,
            'id'          => $this->id,
            'time'        => $this->time,
            'options'     => $this->options,
            'custom_time' => $this->custom_time,
            'countdown'   => $this->countdown,
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
    
    /**
     * Check custom time format
     * 
     * @throws \Exception if format is invalid
     */
    private function checkTime()
    {
        if (!preg_match('#^\d{2}:\d{2}:\d{2}\s\w{2}$#', $this->custom_time))
            throw new \Exception('Invalid custom time format. Should be `12:12:12 am`.');
    }
}
