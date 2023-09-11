<?php

namespace App\Helpers;

/**
 * Class FlightServices
 */
class DateHelper
{
    public function getDays()
    {
        return [
            "Mon" => 'Понеділок',
            "Tue" => 'Вівторок',
            "Wed" => 'Середа',
            "Thu" => 'Четвер',
            "Fri" => 'Пятниця',
            "Sat" => 'Субота',
            "Sun" => 'Неділя',
        ];
    }

    public function getMonth()
    {
        return [
            "Jan" => 'Січень',
            "Feb" => 'Лютий',
            "March" => 'Березень',
            "Apr" => 'Квітень',
            "May" => 'Травень',
            "Jun" => 'Червень',
            "Jul" => 'Липень',
            "Aug" => 'Серпень',
            "Sep" => 'Вересень',
            "Oct" => 'Жовтень',
            "Nov" => 'Листопад',
            "Dec" => 'Грудень',
        ];
    }
}
?>
