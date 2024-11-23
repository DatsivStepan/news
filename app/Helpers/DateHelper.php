<?php

namespace App\Helpers;

/**
 * Class FlightServices
 */
class DateHelper
{
    public static function getMonthByDay($date)
    {
            $timestamp = strtotime($date);

            if (!$timestamp) {
                return "Invalid date";
            }

            $day = date('j', $timestamp);
            $month = date('n', $timestamp);

            $monthNames = [
                1 => 'Січня',
                2 => 'Лютого',
                3 => 'Березня',
                4 => 'Квітня',
                5 => 'Травня',
                6 => 'Червня',
                7 => 'Липня',
                8 => 'Серпня',
                9 => 'Вересня',
                10 => 'Жовтня',
                11 => 'Листопада',
                12 => 'Грудня'
            ];

            $monthInDeclension = $monthNames[$month];

            return "$day $monthInDeclension";
    }

    public static function getDays()
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

    public static function getMonth()
    {
        return [
            "Jan" => 'Січень',
            "Feb" => 'Лютий',
            "Mar" => 'Березень',
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
