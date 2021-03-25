<?php

namespace App\Http\Controllers;

use App\Facades\Calendar;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use nesbot\Carbon;

class CalendarController extends Controller
{
    private $service;

    public function __construct(CalendarService $service)
    {
        $this->service = $service;
    }

    public function index($yearMonth)
    {
        $view_data = [
            'weeks'         => $this->service->getWeeks($yearMonth),
            'month'         => $this->service->getMonth($yearMonth),
            'prev'         => $this->service->getPrev($yearMonth),
            'next'         => $this->service->getNext($yearMonth),
            ];
        return view('Calendar/calendar', $view_data);
    }

    public function show($yearMonth,$day)
    {
        $date = $yearMonth . "-" . $day;

        $view_data = [
            'date' => $date,
            'form' => $this->servce->getFormData($date),
        ];

        return view('Calendar/detail',$view_data);
    }
}
