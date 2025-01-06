<?php

namespace App\Http\Controllers;

use App\Models\SelectRace;
use App\Models\Racerlist;
use Illuminate\Http\Request;
use Auth;
use Config;

class SelectRaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SelectRace  $selectRace
     * @return \Illuminate\Http\Response
     */
    public function show(SelectRace $selectRace)
    {
        $menu = Config::get('menu.racemenu');
        //
        $user = Auth::user();
        $id = Auth::id();
        //return view('selectrace',['judge_order' => $user->name,'title' => $selectRace->title]);
        return view('selectrace',['judge_order' => $user->name,'title' => "レース選択",'menu' => $menu]);
        //return view('selectrace');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SelectRace  $selectRace
     * @return \Illuminate\Http\Response
     */
    public function selectrace(SelectRace $selectRace)
    {
        $menuf = Config::get('menu.racemenuf');
        $menuq = Config::get('menu.racemenuq');
        //
        $user = Auth::user();
        $id = Auth::id();
        return view('selectrace',
        [
            'judge_order' => $user->name,
            'title' => "レース選択",
            'menuq' => $menuq,
            'menuf' => $menuf
        ]);
    }

    public function processrace($raceclass, $sex)
    {
        $user = Auth::user();
        $id = Auth::id();
        if($raceclass=='q1'){
            $class = "Q1";
        }elseif($raceclass=='q2'){
            $class = "Q2";
        }elseif($raceclass=='f1'){
            $class = "F1";
        }elseif($raceclass=='f2'){
            $class = "F2";
        }
        //条件
        /*
        $racerlists = Racerlist::select('sex','season','codex','start', 'BIB', 'SAJNO', 'FISNO', '氏名漢', '県連盟', '所属')
            ->where('sex',$sex)
            ->orderBy('rand', 'asc')
            ->get();
        if (isset($racerlists) && $racerlists) {
            return view('processrace',
                [
                    'judge_order' => $user->name,
                    'title' => "レース進行画面",
                    'class' => $raceclass,
                    'sex' => $sex,
                    'items' => $racerlists,
                ]);
        } else {
            return view('processrace',
                [
                    'judge_order' => $user->name,
                    'title' => "レース進行画面",
                    'class' => $raceclass,
                    'sex' => $sex,
                    'items' => null,
                ]);
        }
        */    
        return view('processrace',
        [
            'judge_order' => $user->name,
            'title' => "レース進行画面",
            'raceclass' => $raceclass,
            'sex' => $sex,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SelectRace  $selectRace
     * @return \Illuminate\Http\Response
     */
    public function selectlist(SelectRace $selectRace)
    {
        $menu = Config::get('menu.listmenu');
        //
        $user = Auth::user();
        $id = Auth::id();
        return view('selectlist',['judge_order' => $user->name,'title' => "リスト表示",'menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SelectRace  $selectRace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelectRace $selectRace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SelectRace  $selectRace
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectRace $selectRace)
    {
        //
    }
}
