<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CurrentDmResult;
use App\Models\RaceInformation;
use Auth;
use Config;

class DmController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        $id = Auth::id();
        $menu = Config::get('menu.numbermenu');
        return view('dm_headjudge',['judge_order' => $user->name,'title' => "ヘッドジャッジ",'menu' => $menu, 'judge' => 'head']);
    }


    public function store(Request $request)
    {
        //
        $judgenum =  RaceInformation::where('name','judgenum')->value('value');
        $currentresult = new CurrentDmResult;

//        $currentresult->sex = $request->input('sex');/*性別*/
//        $currentresult->class = $request->input('class');/*クラス*/
        $currentresult->judgenum = RaceInformation::where('name','judgenum')->value('value');/*審判数*/
        $currentresult->season = RaceInformation::where('name','season')->value('value');/*シーズン*/
//        $currentresult->codex = $request->input('codex');/*CODEX*/
        
        $currentresult->save();
        $user = Auth::user();
        $id = Auth::id();
        return view('dm_headjudge',['judge_order' => $user->name, 'currentresult' => $currentresult]);
    }


    public function getcurrent()
    {
        $user = Auth::user();
        $id = Auth::id();

        $currentresult = CurrentDmResult::first();

        if($currentresult->judgenum==5){
            $currentresult->judge6 = null;
            $currentresult->judge7 = null;
        }
        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }

    }

    public function setStatus(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentDmResult::first();

        if ($user->name == "head" || $user->name == "admin"){
            $current_status = $request->input('type');/*タイプ*/
            $currentresult->status = $request->input('status');/*ステータス*/
    
            $currentresult->judge6 = null;
            $currentresult->judge7 = null;
            if($current_status =='BDNF' || $current_status=='BDNS' || $current_status=='BDSQ' ){
                $currentresult->judge1 = 0;
                $currentresult->judge2 = 0;
                $currentresult->judge3 = 0;
                $currentresult->judge4 = 0;
                $currentresult->judge5 = 0;
                if($currentresult->judgenum > 5){
                    $currentresult->judge6 = 0;
                    $currentresult->judge7 = 0;
                }
            }else if($current_status =='RDNF' || $current_status=='RDNS' || $current_status=='RDSQ' ){
                $currentresult->judge1 = 5;
                $currentresult->judge2 = 5;
                $currentresult->judge3 = 5;
                $currentresult->judge4 = 5;
                $currentresult->judge5 = 5;
                if($currentresult->judgenum > 5){
                    $currentresult->judge6 = 5;
                    $currentresult->judge7 = 5;
                }
            }else if($current_status =='N' ){
                $currentresult->judge1 = 3;
                $currentresult->judge2 = 2;
                $currentresult->judge3 = 2;
                $currentresult->judge4 = 3;
                $currentresult->judge5 = 3;
                if($currentresult->judgenum > 5){
                    $currentresult->judge6 = 3;
                    $currentresult->judge7 = 2;
                }
            }
        }        
        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }

    }

    public function postcurrent(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentDmResult::first();
        //審判数
        $judgenum =  RaceInformation::where('name','judgenum')->value('value');

        if ($user->name == "turn1"){
            $currentresult->judge1 = $request->input('point');/*J1*/

        }elseif ($user->name == "turn2"){
            $currentresult->judge2 = $request->input('point');/*J2*/

        }elseif ($user->name == "turn3"){
            $currentresult->judge3 = $request->input('point');/*J3*/
    
        }elseif ($user->name == "turn4"){
            $currentresult->judge4 = $request->input('point');/*J4*/
    
        }elseif ($user->name == "speed"){
            if($judgenum==5){
                $currentresult->judge4 = $request->input('point');/*J4*/
            }else{
                $currentresult->judge7 = $request->input('point');/*J7*/
            }
    
        }elseif ($user->name == "overall"){
            $currentresult->judge5 = $request->input('point');/*J5*/

        }elseif ($user->name == "air1"){
            if($judgenum==5){
                $currentresult->judge3 = $request->input('point');/*J3*/
            }else{
                $currentresult->judge5 = $request->input('point');/*J6*/
            }
        
        }elseif ($user->name == "air2"){
            $currentresult->judge6 = $request->input('point');/*J7*/
    
        }elseif ($user->name == "head" || $user->name == "admin"){
    
        }else{

        }

        //$currentresult->status = $request->input('status');/*ステータス*/
        //審判数
        $currentresult->judgenum = RaceInformation::where('name','judgenum')->value('value');
        
        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }

    }

}
