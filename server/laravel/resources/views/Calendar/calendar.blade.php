@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('カレンダー') }}</div>
                    {{--                    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
                    <div class="card-body">
                        <div class="flex-center position-ref full-height">
                            <div class="content">
                                <div>
                                    <a href="{{ url('calendar/'.$prev) }}">&lt;</a>
                                    <span class="month">{{ $month }}</span>
                                    <a href="{{ url('calendar/'.$next) }}">&gt;</a>
                                </div>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>日</th>
                                        <th>月</th>
                                        <th>火</th>
                                        <th>水</th>
                                        <th>木</th>
                                        <th>金</th>
                                        <th>土</th>
                                    </tr>
                                    @foreach ($weeks as $week)
                                        {!! $week !!}
                                    @endforeach
                                </table>
                            </div>
                            {{--                    </html>--}}
                        </div>
                    </div>
                </div>
            </div>
@endsection
