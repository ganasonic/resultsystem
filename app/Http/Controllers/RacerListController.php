<?php

namespace App\Http\Controllers;

use App\Models\CurrentResult;
use App\Models\RaceInformation;
use App\Models\ResultList;
use App\Models\Racerlist;
use Illuminate\Http\Request;
use Auth;
use DB;

class RacerListController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStart(Request $request)
    {
        //条件
        $sex = $request->input('sex');
        $season = $request->input('season');
        $codex = $this->getCodex($sex);
        $racekind = $request->input('racekind');
/*
        if($sex=='F'){
            $codex = "codex_f";
        }else{
            $codex = "codex_m";
        }

        $tmp = RaceInformation::where('name',$codex)->get();
        $codex = $tmp[0]->value;
*/
        //$racerlists = Racerlist::select('sex','season','codex','start', 'BIB', 'SAJNO', 'FISNO', '氏名漢', '県連盟', '所属', 'SAJ_MOﾎﾟｲﾝﾄ', 'FIS_MOﾎﾟｲﾝﾄ')->
        $racerlists = Racerlist::select('sex','season','codex','start', 'BIB', 'SAJNO', 'FISNO', '氏名漢', '県連盟', '所属')
            ->where('rand', ">", -1)
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->orderBy('rand', 'asc')
            ->get();
        if (isset($racerlists) && $racerlists) {
            return $racerlists;
        } else {
            return null;
        }
    }

    /**
     * 大会情報のコーデックス取得
     */
    public function getCodex($sex){
        if($sex=='F'){
            $codex = "codex_f";
        }else{
            $codex = "codex_m";
        }

        $tmp = RaceInformation::where('name',$codex)->get();
        $codex = $tmp[0]->value;
        return $codex;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function startlist(Request $request)
    {
        $sex = $request->input('sex');/*性別*/
        $class = $request->input('class');/*クラス*/

        /*
        if($sex=='F'){
            $codex = "codex_f";
        }else{
            $codex = "codex_m";
        }

        $tmp = RaceInformation::where('name',$codex)->get();
        $codex = $tmp[0]->value;
        */
        $codex = $this->getCodex($sex);


        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentResult::first();
        $season = $currentresult->season;/*シーズン*/

        $racerlists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', ">", -1)
        ->where('sex',$sex)
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        $dnslists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', "<=", 0)
        ->where('sex',$sex)
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        if (isset($racerlists) && $racerlists) {
            return [$racerlists, $dnslists];
        } else {
            return null;
        }

    }

    public function createQualification2StartList(Request $request){
        $season = $request->input('season');
        $sex = $request->input('sex');
        $codex = $this->getCodex($sex);
        $class = $request->input('class');
        return ['result'=>"OK"];
    }
    public function createFinal2StartList(Request $request){
        $season = $request->input('season');
        $sex = $request->input('sex');
        $codex = $this->getCodex($sex);
        $class = $request->input('class');
        return ['result'=>"OK"];
    }

    public function createFinal1StartList(Request $request)
    {
        $season = $request->input('season');
        $sex = $request->input('sex');
        $codex = $this->getCodex($sex);
        $class = $request->input('src_class');
        $dst_class = $request->input('dst_class');
        //
        $resultlist = ResultList::select('start', 'bib', 'name', 'pref', 'team', /*'didnot',*/ 'score', 'turn', 'air', 'air1', 'air2', 'sec', 'time', 'tiebreak')
            ->where('didnot', "")
            ->orWhere('didnot', null)
            ->where('sex',$sex)
            ->where('class',$class)
            ->where('season',$season)
            ->where('codex',$codex)
            ->orderBy('score', 'desc')
            ->orderBy('turn', 'desc')
            ->orderBy('air', 'desc')
            ->orderBy('sec', 'desc')
            ->orderBy('sec', 'desc')
            ->limit(16)
            ->get();

        
        if (isset($resultlist) && $resultlist) {
            return json_encode( array('result' => 'OK'), JSON_PRETTY_PRINT ) ;
        } else {
            return $this->dataToJson(
                array('error_code' => 'E101', 'message' => 'data not found.'),
                404
            );
        }
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start_m()
    {
        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentResult::first();
        $season = $currentresult->season;/*シーズン*/
        $codex = $currentresult->codex;/*CODEX*/
        //$racerlists = Racerlist::where('sex','M')->orderBy('rand', 'asc')->get();
        $racerlists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', ">", -1)
        ->where('sex','M')
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        $dnslists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', "<=", 0)
        ->where('sex','M')
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        return view('startlist',
            [
                'judge_order' => $user->name,
                'title' => "男子スタートリスト",
                'racerlists' => $racerlists,
                'sex' => "M",
                'raceclass' => "Q1",
                'dnslists' => $dnslists,
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start_f()
    {
        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentResult::first();
        $season = $currentresult->season;/*シーズン*/
        $codex = $currentresult->codex;/*CODEX*/
        //$racerlists = Racerlist::where('sex','F')->orderBy('rand', 'asc')->get();
        $racerlists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', ">", -1)
        ->where('sex','F')
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();


        $dnslists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', "<=", 0)
        ->where('sex','F')
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();


        return view('startlist',
            [
                'judge_order' => $user->name,
                'title' => "女子スタートリスト",
                'racerlists' => $racerlists,
                'sex' => "F",
                'raceclass' => "Q1",
                'dnslists' => $dnslists,
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entry_m()
    {
        $user = Auth::user();
        $id = Auth::id();
        $racerlists = Racerlist::where('sex','M')->orderBy('通番', 'asc')->get();
        return view('racerlist',['judge_order' => $user->name,'title' => "男子エントリーリスト", 'racerlists' => $racerlists]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entry_f()
    {
        $user = Auth::user();
        $id = Auth::id();
        $racerlists = Racerlist::where('sex','F')->orderBy('通番', 'asc')->get();
        return view('racerlist',['judge_order' => $user->name,'title' => "女子エントリーリスト", 'racerlists' => $racerlists]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $id = Auth::id();
        $racerlists = Racerlist::get();
        return view('racerlist',['judge_order' => $user->name,'title' => "エントリーリスト・スタートリスト", 'racerlists' => $racerlists]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setdraw(Request $request)
    {
        $sex = $request->input('sex');/*性別*/
        $class = $request->input('class');/*クラス*/

        if($sex=='F'){
            $codex = "codex_f";
        }else{
            $codex = "codex_m";
        }

        $tmp = RaceInformation::where('name',$codex)->get();
        $codex = $tmp[0]->value;


        $currentresult = CurrentResult::first();
        $season = $currentresult->season;/*シーズン*/

        //対象のリストを選択（性別、エントリーリスト）
        //対象のリストの件数を取得
        //対象のリストのrand列にrand()で値をセット
        //整列したリストを表示する？
        $user = Auth::user();
        $id = Auth::id();

        $maxCount = Racerlist::where('sex',$sex)
        ->where('season',$season)
        ->where('codex',$codex)
        ->count();

        //update mogul.racerlist set rand = rand() where 通番 in (9, 12, 19, 37, 39) and sex='M';
        //DB:update("update mogul.racerlist set rand = rand() where sex = ?", [$sex]);
        //
        for($index=0; $index<$maxCount; $index++){
            Racerlist::where('sex',$sex)
            ->where('通番', $index+1)
            ->where('rand', ">", -1)
            ->where('season',$season)
            ->where('codex',$codex)
            ->update([
                'rand' => rand(0,1000)
            ]);
        }


        $racerlists = Racerlist::select(
                '通番',
                'start',
                'rand',
                'BIB',
                'SAJNO',
                'FISNO',
                '氏名漢', 
                '氏名R', 
                '県連盟', 
                '所属'
            )
            ->where('rand', ">", -1)
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->orderBy('rand', 'asc')
            ->get();

        $index = 1;
        foreach ($racerlists as $racer) {
            Racerlist::where('通番',$racer->通番)
            ->where('rand', $racer->rand)
            ->where('BIB',$racer->BIB)
            ->update(['start' => $index]);
            $index++;
        }


        $racerlists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', ">", -1)
        ->where('sex',$sex)
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        $dnslists = Racerlist::select(
            '通番',
            'start',
            'rand',
            'BIB',
            'SAJNO',
            'FISNO',
            '氏名漢', 
            '氏名R', 
            '県連盟', 
            '所属'
        )
        ->where('rand', "<=", 0)
        ->where('sex',$sex)
        ->where('season',$season)
        ->where('codex',$codex)
        ->orderBy('rand', 'asc')
        ->get();

        if (isset($racerlists) && $racerlists) {
            return [$racerlists, $dnslists];
        } else {
            return null;
        }
    }

}
