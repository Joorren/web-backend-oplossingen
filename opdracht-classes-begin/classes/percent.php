<?php

class Percent
{
    public $relative, $hundred, $nominal;

    public function __construct($new, $unit)
    {
        $this->relative = $this->FormatNumber($new/$unit);
        $this->hundred = $this->FormatNumber($this->relative * 100);
        if ($this->relative > 1) {
            $this->nominal = "positive";
        }
        elseif ($this->relative = 1) {
            $this->nominal = "status-quo";
        }
        else {
            $this->nominal = "negative";
        }
    }

    public function FormatNumber($number) {
        number_format ($number, 2);
        return $number;
    }
}