<?php

namespace App\Services;

use App\Form;
use Carbon\Carbon;

class FormService
{

    public function getFormData($date)
    {
        
        return Form::parse();
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
