<?php

namespace App\Services;

use Carbon\Carbon;

class CalendarService
{
    /**
     * カレンダーデータを返す
     * @return array
     * @throws \Exception
     */
    public function getWeeks($yearMonth)
    {
        $weeks = [];
        $week = '';
        $dt = new Carbon(self::getYm_firstday($yearMonth));
        $day_of_week = $dt->dayOfWeek;     // 曜日
        $days_in_month = $dt->daysInMonth; // その月の日数

        // 第 1 週目に空のセルを追加
        $week .= str_repeat('<td></td>', $day_of_week);

        for ($day = 1; $day <= $days_in_month; $day++, $day_of_week++) {
            $date = self::getYm($yearMonth) . '-' . $day;
            if (Carbon::now()->format('Y-m-j') === $date) {
                $week .= '<td class="today">' . self::getDay($yearMonth,$day);
            } else {
                $week .= '<td>' . self::getDay($yearMonth,$day);
            }
            $week .= '</td>';


            // 週の終わり、または月末
            if (($day_of_week % 7 === 6) || ($day === $days_in_month)) {
                if ($day === $days_in_month) {
                    $week .= str_repeat('<td></td>', 6 - ($day_of_week % 7));
                }
                $weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }
        return $weeks;
    }

    /*
     *
     */
    public function getDay($yearMonth, int $day)
    {
        $link = "/calendar/" . self::getYmd_format($yearMonth,$day);
        return "<a href='". $link . "'>" .$day ."</a>";
    }

    /**
     * month 文字列を返却する
     *
     * @return string
     */
    public function getMonth($yearMonth)
    {
        return Carbon::parse(self::getYm_firstday($yearMonth))->format('Y年n月');
    }

    /**
     * prev 文字列を返却する
     *
     * @return string
     */
    public function getPrev($yearMonth)
    {
        return Carbon::parse(self::getYm_firstday($yearMonth))->subMonthsNoOverflow()->format('Y-m');
    }

    /**
     * next 文字列を返却する
     *
     * @return string
     */
    public function getNext($yearMonth)
    {
        return Carbon::parse(self::getYm_firstday($yearMonth))->addMonthNoOverflow()->format('Y-m');
    }

    /**
     * Y-m フォーマットを返却する
     *
     * @return string
     */
    private static function getYm($yearMonth)
    {
        if (isset($yearMonth)) {
            return $yearMonth;
        }

        return Carbon::now()->format('Y-m');
    }

    /**
     * 2019-09-01 のような月初めの文字列を返却する
     *
     * @return string
     */
    private static function getYm_firstday($yearMonth)
    {
        return self::getYm($yearMonth) . '-01';
    }

    /**
     * 2019-09/01 のように日を2桁にしリンクを返却する
     *
     * @return string
     */
    private static function getYmd_format($yearMonth,int $day)
    {
        if ($day < 10) {
            $day = 0 . $day;
        }
        return $yearMonth ."/". $day;
    }
}
