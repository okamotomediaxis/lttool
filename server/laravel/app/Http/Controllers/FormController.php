<?php

namespace App\Http\Controllers;

use App\Model\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function index()
    {
        $today = new Carbon('today');
        return view('Form.index',compact('today'));
    }

    public function send(Request $request)
    {

        $validate_rule = [
            'date' => ['required', 'date'],
            'presentationScore' => ['required', 'integer'],
            'operationScore' => ['required', 'integer'],
        ];

        try {
            $this->validate($request, $validate_rule);
        } catch (ValidationException $e) {
            return redirect('/form')->with('message', '入力に誤りがあります');
        }

        $param = [
            'date' => $request->input('date'),
            'presentation_score' => $request->input('presentationScore'),
            'operation_score' => $request->input('operationScore'),
            'good' => $request->input('goodMessage'),
            'improve' => $request->input('improveMessage'),
            'other' => $request->input('other'),
        ];

        Form::query()->create($param);

        return redirect('/form')->with('message', '回答ありがとうございました');
    }
}
