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
                    <div class="card-header">{{ __($date) }}</div>
                    {{--                    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
                    <div class="card-body">
                        <div class="flex-center position-ref full-height">
                            <div class="content">
                                追加する予定の項目①発表内容（★）
                                追加する予定の項目②プレゼン資料URL（★）
                                追加する予定の項目③アンケート集計（★）
                                追加する予定の項目④画像投稿
                        </div>
                    </div>
                </div>
            </div>
@endsection
