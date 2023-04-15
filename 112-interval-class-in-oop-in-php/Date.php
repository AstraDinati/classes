<?php
class Date
{
    private $date;
    public function __construct($date = null)
    {
        if (!isset($date)) {
            $this->date = time();
        } else {
            $this->date = strtotime($date);
        }
        // если дата не передана - пусть берется текущая
    }

    public function getDay()
    {
        return date('d', $this->date);
        // возвращает день
    }

    public function getMonth($lang = null)
    {
        $months_ru = [
            '0', 'Январь', 'Февраль', 'Март',
            'Апрель', 'Май', 'Июнь', 'Июль', 'Август',
            'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
        ];

        $months_en = [
            '0', "January", "February", "March",
            "April", "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];
        if (isset($lang)) {
            if ($lang === 'ru') {
                return $months_ru[date('n', $this->date)];
            } elseif ($lang === 'en') {
                return $months_en[date('n', $this->date)];
            }
        } else {
            return date('n', $this->date);
        }
        // возвращает месяц

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке 
    }

    public function getYear()
    {
        return date('Y', $this->date);
        // возвращает год
    }

    public function getWeekDay($lang = null)
    {
        $weekDay_ru = [
            'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
            'Четверг', 'Пятница', 'Суббота'
        ];

        $weekDay_en = [
            "Sunday", "Monday", "Tuesday",
            "Wednesday", "Thursday", "Friday", "Saturday"
        ];

        if (isset($lang)) {
            if ($lang === 'ru') {
                return $weekDay_ru[date('w', $this->date)];
            } elseif ($lang === 'en') {
                return $weekDay_en[date('w', $this->date)];
            }
        } else {
            return date('w', $this->date);
        }
        // возвращает день недели

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть день будет словом на заданном языке 
    }

    public function addDay($value)
    {
        $this->date  = $this->date + $value * 60*60*24;
        // добавляет значение $value к дню
    }

    public function subDay($value)
    {
        $this->date  = $this->date - $value * 60*60*24;
        // отнимает значение $value от дня
    }

    public function addMonth($value)
    {
        $date = date_create(date('Y-m-d', $this->date));
        date_modify($date, "$value month");
        $this->date = strtotime(date_format($date, 'Y-m-d'));
        // добавляет значение $value к месяцу
    }

    public function subMonth($value)
    {
        $date = date_create(date('Y-m-d', $this->date));
        date_modify($date, "- $value month");
        $this->date = strtotime(date_format($date, 'Y-m-d'));
        // отнимает значение $value от месяца
    }

    public function addYear($value)
    {
        $date = date_create(date('Y-m-d', $this->date));
        date_modify($date, "$value year");
        $this->date = strtotime(date_format($date, 'Y-m-d'));
        // добавляет значение $value к году
    }

    public function subYear($value)
    {
        $date = date_create(date('Y-m-d', $this->date));
        date_modify($date, "- $value year");
        $this->date = strtotime(date_format($date, 'Y-m-d'));
        // отнимает значение $value от года
    }

    public function format($format)
    {
        return date($format, $this->date);
        // выведет дату в указанном формате
        // формат пусть будет такой же, как в функции date
    }

    public function __toString()
    {
        return date('Y-m-d', $this->date);
        // выведет дату в формате 'год-месяц-день'
    }
}


// $date = new Date();

// echo $date->getMonth('ru') . "\n";

// echo '<br>';

// echo $date->getWeekDay('ru');

// echo '<br>';

// $date->addMonth(2);

// echo $date->getMonth('ru') . "\n";

// echo '<br>';

// $date->subMonth(2);

// echo $date->getMonth('ru') . "\n";

// echo '<br>';

// echo $date;

// $date->subYear(2);

// echo '<br>';

// echo $date;