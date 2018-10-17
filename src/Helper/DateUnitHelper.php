<?php

namespace Milestone\Appframe\Helper;

class DateUnitHelper
{
    private $unit;
    public $date;

    public function __construct($unit)
    {
        $this->unit = $unit;
        $this->date = time();
    }

    public function get(){
        return [
            'days' => $this->getDays(),
            'previous' => $this->getPrevious()
        ];
    }

    private function getDays(){
        $date = $this->date; $days = date('z', $date) + 1;
        switch (mb_substr($this->unit,0,1)){
            case 'Y':
                break;
            case 'H':
                $days -= ($days > 31+28+31+30+31+30+date('L',$date)) ? (31+28+31+30+31+30+date('L',$date)) : 0;
                break;
            case 'Q':
                $tm = date('n',$date); $Q1 = 31+28+31+date('L',$date);
                $days -= ($tm < 4) ? 0 : (($tm < 7) ? $Q1 : (($tm < 10) ? $Q1+30+31+30 : $Q1+30+31+30+31+31+30));
                break;
            case 'M':
                $days = date('j',$date);
                break;
            case 'W':
                $days = date('w',$date)+1;
                $days = ($this->unit == 'WTD2') ? (($days == '0') ? 7 : $days-1) : $days;
                break;
        }
        return $days;
    }

    private function getPrevious(){
        $days = 0; $date = $this->date;
        switch (mb_substr($this->unit,0,1)){
            case 'W':
                $days = 7;
                break;
            case 'M':
                $days = date('t',strtotime('-1 month',$date));
                break;
            case 'Q':
                $pq = date('n',strtotime('-3 month',$date));
                $days = ($pq < 4) ? 31+28+31+date('L',strtotime('-3 month',$date)) :
                    (($pq < 7) ? 30+31+30 :
                        (($pq < 10) ? 31+31+30 : 31+30+31)
                    );
                break;
            case 'H':
                $ph = date('n',strtotime('-6 month',$date));
                $days = ($ph < 7) ? 31+28+31+30+31+30+date('L',strtotime('-3 month',$date)) : 31+31+30+31+30+31;
                break;
            case 'Y':
                $days = 365 + date('L',strtotime('-1 year',$date));
                break;
        }
        return $days;
    }
}