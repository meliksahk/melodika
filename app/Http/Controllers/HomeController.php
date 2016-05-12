<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Switches;
use Illuminate\Http\Request;
use App\Buttons;
use Auth;
use View;
use App\Temp;
use Flash;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $user = Auth::user();
        View::share('user',$user);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $ideal = 0;
        $kontrol = 0;
        $user = Auth::user();
        $ariza = 0;
        $temp = Temp::where('userid',$user->otelname)->first();
        $switches = Switches::where('userid',$user->otelname)->first();
        $buttons = Buttons::where('userid',$user->otelname)->first();
        if (is_array($temp) || is_object($temp)) {
            for($i = 1;$i<17;$i++){
                if($i != 14 && $i != 7 && $i != 9){
                    if($temp['t'.$i] <= 125){
                        $ideal++;
                    }
                    if($temp['t'.$i] > 125 && $temp['t'.$i] <= 175){
                        $kontrol++;
                    }
                    if($temp['t'.$i] > 175){
                        $ariza++;
                    }
                }
            }
            return view('home')->with('temp', $temp)
                               ->with('ideal', $ideal)
                               ->with('kontrol', $kontrol)
                               ->with('switches', $switches)
                               ->with('buttons', $buttons)
                               ->with('ariza', $ariza);
        }else {
            Flash::error('Ölçümler henüz alınmamış. Lütfen masaüstü uygulamanızı çalıştırınız.');
            return view('home')->with('temp', $temp)
                                ->with('ideal', $ideal)
                                ->with('kontrol', $kontrol)
                                ->with('switches', $switches)
                                ->with('buttons', $buttons)
                                ->with('ariza', $ariza);
        }
    }
    public function temp(){
        //dd(Session::all());
        $user = Auth::user();
        $temp = Temp::where('userid',$user->otelname)->first();
        if (is_array($temp) || is_object($temp)) {
            return view('temperatures')->with('temp', $temp);
        }else{
            Flash::error('Ölçümler henüz alınmamış. Lütfen masaüstü uygulamanızı çalıştırınız.');
            return view('home');

        }
    }
    public function turnOff(){
        $user = Auth::user();
        Buttons::where('userid' ,'=', $user->otelname)->update(['all' => 1]);
        return $this->index();
    }
}
