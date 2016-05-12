<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Temp;
use Auth;
use Hash;
use App\Switches;
use App\Buttons;
use DB;
use DebugBar;
class ServiceController extends Controller
{
    public function getLogin(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        $mail = $obj['mail'];
        $pass = $obj['pass'];
        \Debugbar::disable();

        $get = DB::table('users')->where('email',$mail)->first();
        if(empty($get)){
            return 'Sisteme kayıtlı olmayan kullanıcı';
        }else{
            if(Hash::check($pass,$get->password)){
                return $get->otelname;
            }else{
            return 'Şifre hatalı';
            }
        }
    }
    public function getSensorsTemperature()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        $user = Auth::user();
        \Debugbar::disable();
        $value = $obj['relays'][0];

        $check = Temp::where('userid',$value['otelid'])->first();
        if (empty($check)) {

            $temp = new Temp();
            $temp->userid = $value['otelid'];
            $temp->t1 = $value['t1'];
            $temp->t2 = $value['t2'];
            $temp->t3 = $value['t3'];
            $temp->t4 = $value['t4'];
            $temp->t5 = $value['t5'];
            $temp->t6 = $value['t6'];
            $temp->t8 = $value['t8'];
            $temp->t10 = $value['t10'];
            $temp->t11= $value['t11'];
            $temp->t12 = $value['t12'];
            $temp->t13 = $value['t13'];
            $temp->t15 = $value['t15'];
            $temp->t16 = $value['t16'];
            $temp->save();
            return 'Oluşturuldu';

        }else{
            Temp::where('userid' ,'=', $value['otelid'])->update(['t1' => $value['t1'],'t2' => $value['t2'],'t3' => $value['t3'],'t4' => $value['t4'],'t5' => $value['t5'],'t6' => $value['t6'],
                't8' => $value['t8'],'t10' => $value['t10'],'t11' => $value['t11'],'t12' => $value['t12'],'t13' => $value['t13'],'t15' => $value['t15'],'t16' => $value['t16']]);
            return 'Güncellendi';

        }
    }
    public function switches(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        \Debugbar::disable();
        $check = Switches::where('userid',$obj['otelid'])->first();
        if (empty($check)) {
            $switches = new Switches();
            $switches->userid = $obj['otelid'];
            $switches->r1 = $obj['r1'];
            $switches->r2 = $obj['r2'];
            $switches->r3 = $obj['r3'];
            $switches->r4 = $obj['r4'];
            $switches->r5 = $obj['r5'];
            $switches->r6 = $obj['r6'];
            $switches->r7 = $obj['r7'];
            $switches->r8 = $obj['r8'];
            $switches->save();
            return 'Oluşturuldu';
        }else{
            Switches::where('userid' ,'=', $obj['otelid'])->update(['r1' => $obj['r1'],'r2' => $obj['r2'],'r3' => $obj['r3'],'r4' => $obj['r4'],'r5' => $obj['r5'],'r6' => $obj['r6'],
                'r7' => $obj['r7'],'r8' => $obj['r8']]);
            return 'Güncellendi';
        }
    }
    public function buttons(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        \Debugbar::disable();
        $check = Buttons::where('userid',$obj['otelid'])->first();
        if (empty($check)) {
            $buttons = new Buttons();
            $buttons->userid = $obj['otelid'];
            $buttons->b1 = $obj['b1'];
            $buttons->b2 = $obj['b2'];
            $buttons->b3 = $obj['b3'];
            $buttons->b4 = $obj['b4'];
            $buttons->b5 = $obj['b5'];
            $buttons->b6 = $obj['b6'];
            $buttons->all = $obj['all'];
            $buttons->save();
            return 'Oluşturuldu';
        }else{
            Buttons::where('userid' ,'=', $obj['otelid'])->update(['b1' => $obj['b1'],'b2' => $obj['b2'],'b3' => $obj['b3'],'b4' => $obj['b4'],'b5' => $obj['b5'],'b6' => $obj['b6'],
                'all' => $obj['all']]);
            return 'Güncellendi';
        }
    }
    public function checkButtons(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);
        \Debugbar::disable();
        $check = Buttons::where('userid',$obj['otelid'])->first();

        return $check['b1'].','.$check['b2'].','.$check['b3'].','.$check['b4'].','.$check['b5'].','.$check['b6'].','.$check['all'];

    }

}