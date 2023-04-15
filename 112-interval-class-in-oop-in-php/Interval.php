<?php
require_once 'Date.php';
class Interval
{
    private $date1;
    private $date2;
    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function toDays()
    {
        return floor(abs(strtotime($this->date1) - 
        strtotime($this->date2))/60/60/24);
        // вернет разницу в днях
    }

    public function toMonths()
    {
        return floor(abs(strtotime($this->date1) - 
        strtotime($this->date2))/60/60/24/30);    
        // вернет разницу в месяцах
    }

    public function toYears()
    {
        return floor(abs(strtotime($this->date1) - 
        strtotime($this->date2))/60/60/24/30/12);  
        // вернет разницу в годах
    }
}

// $date1 = new Date('2022-02-07');
// $date2 = new Date();

// $interval = new Interval($date1, $date2);

// echo $interval->toDays();
// echo '<br>';
// echo $interval->toMonths();
// echo '<br>';
// echo $interval->toYears();