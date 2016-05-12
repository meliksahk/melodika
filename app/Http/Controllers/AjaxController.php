<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Switches;
use App\Buttons;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Temp;
use Flash;


class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function switchesAjax(){
        $user = Auth::user();
        $switches = Switches::where('userid',$user->otelname)->first();
        return view('Ajax.switchesAjax')->with('switches',$switches);
    }
    public function buttonsAjax(Request $request){
        $user = Auth::user();

        $input =  $request->input('input');
        $data =  $request->input('dat');
        if($input != null)
            Buttons::where('userid' ,'=', $user->otelname)->update([$input => $data]);
        $buttons = Buttons::where('userid',$user->otelname)->first();
        return view('Ajax.buttonsAjax')->with('buttons',$buttons);
    }
}