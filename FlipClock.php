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
 * 
 * @todo add callbacks
 */

class FlipClock extends \yii\base\Widget
{
    /** 
     * Name of FlipClock instance
     * @var string
     */
    public $name = 'flipclock';
    
    /**
     * ID selector for FlipClock div
     * @var string
     */
    public $id;
    
    /**
     * Use as countdown
     * @var bool
     */
    public $countdown = false;
    
    /**
     * Countdown time
     * @var int
     */
    public $time = 120;
    
    /**
     * Display days
     * @var bool
     */
    public $daily = true;
    
    /**
     * Custom time
     * @var string|bool
     */
    public $custom_time = false;
    
    /**
     * Additional options for FlipClock
     * @var array|null
     */
    public $options = null;
    
    public function init()
    {
        if ($this->custom_time)
            $this->checkTime();
        
        $this->checkId();
        $this->setDaily();
        $this->setCountdown();
        
        if (!is_null($this->options))
            $this->optionsToJS();
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
     * If no ID specified the name will be used as ID
     */
    private function checkId()
    {
        if (!$this->id)
            $this->id = $this->name;
    }
    
    /**
     * Adds clockface option to show days if daily property is set to TRUE
     */
    private function setDaily()
    {
        if ($this->daily && !isset($this->options['clockFace']))
            $this->options['clockFace'] ='DailyCounter';
    }
    
    /**
     * Adds countdown option
     */
    private function setCountdown()
    {
        if ($this->countdown)
            $this->options['countdown'] = 'true';
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
     * @throws \Exception if format is invalid or clockface is not set
     */
    private function checkTime()
    {
        if (!isset($this->options['clockFace']))
            throw new \Exception('Clockface property have to be specified to use custom time.');
        
        if (!preg_match('#^\d{2}:\d{2}:\d{2}\s\w{2}$#', $this->custom_time))
            throw new \Exception('Invalid custom time format. Should be `12:12:12 am`.');
    }
}
