@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('アンケートフォーム') }}</div>
                    <div class="card-body">
                        <table>
                            <form method="POST" action="/form">
                                @csrf

                                <tr>
                                    <th>参加日</th>
                                    <td>
                                        <input name="date">{{ old('date') }}
                                        @if ($errors->has('date'))
                                            <p class="error-message">{{ $errors->first('date') }}</p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>発表の満足度</th>
                                    <td>大変良い<input name="presentationScore" type="radio" value="{{ old('presentationExcellent') }}" checked>
                                        良い<input name="presentationScore" type="radio" value="{{ old('presentationGood') }}">
                                        普通<input name="presentationScore" type="radio" value="{{ old('presentationAverage') }}">
                                        悪い<input name="presentationScore" type="radio" value="{{ old('presentationPoor') }}"></td>
                                </tr>

                                <tr>
                                    <th>運営･ランチの満足度</th>
                                    <td>大変良い<input name="operationScore" type="radio" value="{{ old('operationExcellent') }}">
                                        良い<input name="operationScore" type="radio" value="{{ old('operationGood') }}">
                                        普通<input name="operationScore" type="radio" value="{{ old('operationAverage') }}">
                                        悪い<input name="operationScore" type="radio" value="{{ old('operationPoor') }}"></td>
                                </tr>

                                <tr>
                                    <th>良かった点</th>
                                    <td><textarea name="goodMessage">{{ old('goodMessage') }}</textarea>
                                        @if ($errors->has('goodMessage'))
                                            <p class="errormessage">{{ $errors->first('goodMessage') }}</p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>改善点</th>
                                    <td>
                                        <textarea name="improveMessage">{{ old('improveMessage') }}</textarea>
                                        @if ($errors->has('improveMessage'))
                                            <p class="errormessage">{{ $errors->first('improveMessage') }}</p>
                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <th>その他</th>
                                    <td>
                                        <textarea name="other">{{ old('other') }}</textarea>
                                        @if ($errors->has('other'))
                                            <p class="errormessage">{{ $errors->first('other') }}</p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                    <button type="submit">
                                        {{ __('送信') }}
                                    </button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
