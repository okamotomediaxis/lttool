<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('Form.index');
    }

    public function send(Request $request)
    {
        return redirect('/form')->with('message', '回答ありがとうございました');
    }
}
