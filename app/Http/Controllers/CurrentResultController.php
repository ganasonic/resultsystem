<?php

namespace App\Http\Controllers;

use App\Models\CurrentResult;
use App\Models\HeadJudge;
use App\Models\Raceinfo;
use App\Models\RaceInformation;
use App\Models\MogulAirDd;
use App\Models\Racerlist;

use Illuminate\Http\Request;
use Auth;

class CurrentResultController extends Controller
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
        $user = Auth::user();
        $id = Auth::id();
        return view('currentresult/create',['judge_order' => $user->name,'title' => "管理用",]);
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
        $currentresult = new CurrentResult;

        $currentresult->sex = $request->input('sex');/*性別*/
        $currentresult->class = $request->input('class');/*クラス*/
        $currentresult->season = $request->input('season');/*シーズン*/
        $currentresult->codex = $request->input('codex');/*CODEX*/
        $currentresult->sajno = $request->input('sajno');/*SAJ NO*/
        //$currentresult->start = $request->input('start');/*スタートNo*/
        $currentresult->name = $request->input('name');/*選手名*/
        $currentresult->bib = $request->input('bib');/*BIB*/


        $currentresult->pref = $request->input('pref');/*県連*/
        $currentresult->team = $request->input('team');/*チーム*/
        
        $currentresult->save();
        $user = Auth::user();
        $id = Auth::id();
        return view('headjudge',['judge_order' => $user->name, 'currentresult' => $currentresult]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        $id = Auth::id();
        //$currentresult=CurrentResult::find($id);
        $currentresult = CurrentResult::first();
        return view('headjudge',['judge_order' => $user->name, 'currentresult' => $currentresult]);
    }

    public function getPacetime(){
        $currentresult = CurrentResult::first();
        /*タイム再計算*/
        $course_length =  RaceInformation::where('name','course_length')->value('value');
        //タイムポイント計算式
        if($currentresult->sex=='F'){
            $pace_time =  RaceInformation::where('name','pace_time_f')->value('value');
        }else{
            $pace_time =  RaceInformation::where('name','pace_time_m')->value('value');
        }
        $paceset_time =  round($course_length / $pace_time, 2, PHP_ROUND_HALF_DOWN);

        if (isset($paceset_time) && $paceset_time) {
            return $paceset_time;
        } else {
            return null;
        }
    }

    public function getcurrentracer()
    {
        $currentresult = CurrentResult::select('sex','class','season','codex','sajno','start','bib','name','pref','team')->first();
        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }
    }

    public function getcurrent()
    {
        $user = Auth::user();
        $id = Auth::id();
        //$currentresult = CurrentResult::find($id);
        $currentresult = CurrentResult::first();

        //再計算
        //トータルスコアを計算する
        //5人ジャッジ
        if( $currentresult->turnB5 === 0 and $currentresult->turnB5 === 0 ){
            $turn_B_point = ($currentresult->turnB1 + $currentresult->turnB2 + $currentresult->turnB3 );
            $turn_D_point = ($currentresult->turnD1 + $currentresult->turnD2 + $currentresult->turnD3);
            $turn_point = $turn_B_point - $turn_D_point;
        //7人ジャッジ
        }else{
            $base_max = max($currentresult->turnB1, $currentresult->turnB2, $currentresult->turnB3, $currentresult->turnB4, $currentresult->turnB5 );
            $base_min = min($currentresult->turnB1, $currentresult->turnB2, $currentresult->turnB3, $currentresult->turnB4, $currentresult->turnB5 );
            $deduction_max = max($currentresult->turnD1, $currentresult->turnD2, $currentresult->turnD3, $currentresult->turnD4, $currentresult->turnD5 );
            $deduction_min = min($currentresult->turnD1, $currentresult->turnD2, $currentresult->turnD3, $currentresult->turnD4, $currentresult->turnD5 );
            $turn_B_point = ($currentresult->turnB1 + $currentresult->turnB2 + $currentresult->turnB3 + $currentresult->turnB4 + $currentresult->turnB5 ) - ($base_max + $base_min);
            $turn_D_point = ($currentresult->turnD1 + $currentresult->turnD2 + $currentresult->turnD3 + $currentresult->turnD4 + $currentresult->turnD5 ) - ($deduction_max + $deduction_min);;
            $turn_point = $turn_B_point - $turn_D_point;
        }
        if( $turn_point < 0){
            $turn_point = 0.1;
        }
        $currentresult->turn = round($turn_point,2,PHP_ROUND_HALF_DOWN);/*ターンスコア*/

        //エア難度
        if( ($currentresult->air11 == $currentresult->air21) && ($currentresult->air12 == $currentresult->air22)){
            if($currentresult->sex=='F'){
                $air1_dd = MogulAirDd::where('code',$currentresult->air11)->value('value_f');
                $air2_dd = MogulAirDd::where('code',$currentresult->air12)->value('value_f');
            }else{
                $air1_dd = MogulAirDd::where('code',$currentresult->air11)->value('value_m');
                $air2_dd = MogulAirDd::where('code',$currentresult->air12)->value('value_m');
            }
        }else{
            $air1_dd = 0;
            $air2_dd = 0;
        }

        //エアジャッジ1
        $air11_point = round($currentresult->air1_1 * $air1_dd,2,PHP_ROUND_HALF_DOWN);//RoundDown 2
        $air12_point = round($currentresult->air1_2 * $air2_dd,2,PHP_ROUND_HALF_DOWN);
        $air1_point = $air11_point + $air12_point;
        //エアジャッジ2
        $air21_point = round($currentresult->air2_1 * $air1_dd,2,PHP_ROUND_HALF_DOWN);
        $air22_point = round($currentresult->air2_2 * $air2_dd,2,PHP_ROUND_HALF_DOWN);
        $air2_point = $air21_point + $air22_point;
        /*エアスコア*/
        $air_point = round(( $air1_point + $air2_point ) /2,2,PHP_ROUND_HALF_DOWN);
        $currentresult->air = $air_point;

        /*タイム再計算*/
        $course_length =  RaceInformation::where('name','course_length')->value('value');
        //ジェンダー・タイムポイント計算式
        if($currentresult->sex=='F'){
            $pace_time =  RaceInformation::where('name','pace_time_f')->value('value');
        }else{
            $pace_time =  RaceInformation::where('name','pace_time_m')->value('value');
        }
        //審判数
        $judgenum =  RaceInformation::where('name','judgenum')->value('value');

        $paceset_time =  round($course_length / $pace_time, 2, PHP_ROUND_HALF_DOWN);
        if($currentresult->sec == null){
            $currentresult->time = 0;
        }else{
            $currentresult->time = round(48 - 32 * $currentresult->sec / $paceset_time, 2, PHP_ROUND_HALF_DOWN);
        }
        if($currentresult->time>=20.0){
            $currentresult->time = 20.0;
        }

        /*DNS/DSQ/DNF*/
        if($currentresult->didnot =='DNS' || $currentresult->didnot=='DNF' || $currentresult->didnot=='DSQ' ){
            $currentresult->score = $currentresult->didnot;
        }else{
            /*トータルスコア*/
            $currentresult->score = round($turn_point + $air_point + $currentresult->time, 2, PHP_ROUND_HALF_DOWN);
        }

        $currentresult->update();
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
        $currentresult = CurrentResult::first();

        if ($user->name == "head" || $user->name == "admin"){
            $currentresult->didnot = $request->input('type');/*タイプ*/
            $currentresult->status = $request->input('status');/*ステータス*/
    
            if($currentresult->didnot =='DNS' || $currentresult->didnot=='DNF' || $currentresult->didnot=='DSQ' ){
                $currentresult->score = $currentresult->didnot;
            }else{
                $currentresult->score = 0;
                $currentresult->didnot = "";
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
        //$currentresult = CurrentResult::find($id);
        $currentresult = CurrentResult::first();

        if ($user->name == "turn1"){
            $currentresult->turnB1 = $request->input('turnB');/*ターンスJ1 ベース*/
            $currentresult->turnD1 = $request->input('turnD');/*ターンスJ1 減点*/
        }elseif ($user->name == "turn2"){
            $currentresult->turnB2 = $request->input('turnB');/*ターンスJ2 ベース*/
            $currentresult->turnD2 = $request->input('turnD');/*ターンスJ2 減点*/

        }elseif ($user->name == "turn3"){
            $currentresult->turnB3 = $request->input('turnB');/*ターンスJ3 ベース*/
            $currentresult->turnD3 = $request->input('turnD');/*ターンスJ3 減点*/
    
        }elseif ($user->name == "turn4"){
            $currentresult->turnB4 = $request->input('turnB');/*ターンスJ4 ベース*/
            $currentresult->turnD4 = $request->input('turnD');/*ターンスJ4 減点*/
    
        }elseif ($user->name == "turn5"){
            $currentresult->turnB5 = $request->input('turnB');/*ターンスJ5 ベース*/
            $currentresult->turnD5 = $request->input('turnD');/*ターンスJ5 減点*/

        }elseif ($user->name == "air1"){
            $currentresult->air1_1 = $request->input('air_point1');/*A1-1 ポイント*/
            $currentresult->air1_2 = $request->input('air_point2');/*A1-2 ポイント*/
            $currentresult->air11 = $request->input('air_code1');/*A1-1 技名*/
            $currentresult->air12 = $request->input('air_code2');/*A1-2 技名*/

            $currentresult->air1_dd = $request->input('air1_dd');/*A1 難度*/
            $currentresult->air2_dd = $request->input('air2_dd');/*A2 難度*/
        
        }elseif ($user->name == "air2"){
            $currentresult->air2_1 = $request->input('air_point1');/*A2-1 ポイント*/
            $currentresult->air2_2 = $request->input('air_point2');/*A2-2 ポイント*/
            $currentresult->air21 = $request->input('air_code1');/*A2-1 技名*/
            $currentresult->air22 = $request->input('air_code2');/*A2-2 技名*/
    
            $currentresult->air1_dd = $request->input('air1_dd');/*A1 難度*/
            $currentresult->air2_dd = $request->input('air2_dd');/*A2 難度*/
    
        }elseif ($user->name == "head" || $user->name == "admin"){
            //エア難度
            $currentresult->air1 = $request->input('air_code1');/*A2-1 技名*/
            $currentresult->air2 = $request->input('air_code2');/*A1-2 技名*/
            if($currentresult->sex=='F'){
                $currentresult->air1_dd =  MogulAirDd::where('code',$currentresult->air11)->value('value_f');
                $currentresult->air2_dd =  MogulAirDd::where('code',$currentresult->air12)->value('value_f');
            }else{
                $currentresult->air1_dd =  MogulAirDd::where('code',$currentresult->air11)->value('value_m');
                $currentresult->air2_dd =  MogulAirDd::where('code',$currentresult->air12)->value('value_m');
            }
    
        }elseif ($user->name == "time"){
            $currentresult->sec = $request->input('sec');/*タイム*/
            $currentresult->time = $request->input('time');/*タイムポイント*/
            //$paceset_time = $request->input('paceset');/*ペースセット*/

        }else{

        }

        $currentresult->status = $request->input('status');/*ステータス*/
        
        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $id = Auth::id();
        $currentresult = CurrentResult::find($id);

        if ($user->name == "turn1"){
            $currentresult->turnB1 = $request->input('turnB1');/*ターンスJ1 ベース*/
            $currentresult->turnD1 = $request->input('turnD1');/*ターンスJ1 減点*/
        }elseif ($user->name == "turn1"){
            $currentresult->turnB1 = $request->input('turnB1');/*ターンスJ1 ベース*/
            $currentresult->turnD1 = $request->input('turnD1');/*ターンスJ1 減点*/

        }elseif ($user->name == "turn2"){
            $currentresult->turnB2 = $request->input('turnB2');/*ターンスJ2 ベース*/
            $currentresult->turnD2 = $request->input('turnD2');/*ターンスJ2 減点*/

        }elseif ($user->name == "turn3"){
            $currentresult->turnB3 = $request->input('turnB3');/*ターンスJ3 ベース*/
            $currentresult->turnD3 = $request->input('turnD3');/*ターンスJ3 減点*/
    
        }elseif ($user->name == "turn4"){
            $currentresult->turnB4 = $request->input('turnB4');/*ターンスJ4 ベース*/
            $currentresult->turnD4 = $request->input('turnD4');/*ターンスJ4 減点*/
    
        }elseif ($user->name == "turn5"){
            $currentresult->turnB5 = $request->input('turnB5');/*ターンスJ5 ベース*/
            $currentresult->turnD5 = $request->input('turnD5');/*ターンスJ5 減点*/

        }elseif ($user->name == "air1"){
            $currentresult->air1_1 = $request->input('air1_1');/*A1-1 ポイント*/
            $currentresult->air1_2 = $request->input('air1_2');/*A1-2 ポイント*/
            $currentresult->air11 = $request->input('air11');/*A1-1 技名*/
            $currentresult->air12 = $request->input('air12');/*A1-2 技名*/
    

        }elseif ($user->name == "air2"){
            $currentresult->air2_1 = $request->input('air2_1');/*A2-1 ポイント*/
            $currentresult->air2_2 = $request->input('air2_2');/*A2-2 ポイント*/
            $currentresult->air21 = $request->input('air21');/*A2-1 技名*/
            $currentresult->air22 = $request->input('air22');/*A2-2 技名*/

        }elseif ($user->name == "head"){
            $currentresult->sec = $request->input('score');/*スコア*/
            $currentresult->status = $request->input('status');/*ステータス*/

        }elseif ($user->name == "admin"){
            $currentresult->sec = $request->input('score');/*スコア*/
            $currentresult->status = $request->input('status');/*ステータス*/
            
        }elseif ($user->name == "time"){
            $currentresult->sec = $request->input('sec');/*タイム*/
            $currentresult->time = $request->input('time');/*タイムポイント*/

        }else{

        }
    
        //$currentresult->score = $request->input('score');/*トータルスコア*/
        $currentresult->turn = $request->input('turn');/*ターンスコア*/
        $currentresult->air = $request->input('air');/*エアスコア*/
        $currentresult->air1 = $request->input('air1');/*A1 技名*/
        $currentresult->air2 = $request->input('air2');/*A2 技名*/

        $currentresult->air1_dd = $request->input('air1_dd');/*A1 難度*/
        $currentresult->air2_dd = $request->input('air2_dd');/*A2 難度*/

        $currentresult->status = $request->input('status');/*ステータス*/
        
        $currentresult->save();
        $user = Auth::user();
        $id = Auth::id();
        return view('headjudge',['judge_order' => $user->name, 'currentresult' => $currentresult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request/*, $id*/)
    {
        $row_count = CurrentResult::select()->count();
        if( $row_count > 0 ){
            $currentresult = CurrentResult::first();
        }else{
            $currentresult = new CurrentResult;
        }
        //
        $currentresult->sex = $request->input('sex');/*性別*/
        $currentresult->class = $request->input('class');/*クラス*/
        $currentresult->season = $request->input('season');/*シーズン*/
        $currentresult->codex = $request->input('codex');/*CODEX*/
        $currentresult->sajno = $request->input('sajno');/*SAJ NO*/
        $currentresult->start = $request->input('start');/*スタートNo*/
        $currentresult->name = $request->input('name');/*選手名*/
        $currentresult->bib = $request->input('bib');/*BIB*/


        $currentresult->pref = $request->input('pref');/*県連*/
        $currentresult->team = $request->input('team');/*チーム*/

        if( $row_count > 0 ){
            $currentresult->update();
        }else{
            $currentresult->save();
        }

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }
    }

    public function getNextRacer(Request $request/*, $id*/)
    {
        $currentresult = CurrentResult::first();

        $start_no = $currentresult->start;
        //条件
        $sex = $currentresult->sex;
        $season = $currentresult->season;
        $codex = $currentresult->codex;
        $total = Racerlist::select()
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->where('start','>',0)
            ->count();
        $start_no = $start_no + 1;
        if($start_no >= $total){
            $start_no = $total;
        }

        $racerlists = Racerlist::select('sex','season','codex','start', 'BIB', 'SAJNO', 'FISNO', '氏名漢', '県連盟', '所属')
            ->where('start',$start_no)
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->first();

        $currentresult->sex = $racerlists->sex;/*性別*/
        $currentresult->season = $racerlists->season;/*シーズン*/
        $currentresult->codex = $racerlists->codex;/*CODEX*/
        $currentresult->sajno = $racerlists->SAJNO;/*SAJ NO*/
        $currentresult->start = $racerlists->start;/*スタートNo*/
        $currentresult->name = $racerlists->氏名漢;/*選手名*/
        $currentresult->bib = $racerlists->BIB;/*BIB*/

        $currentresult->pref = $racerlists->県連盟;/*県連*/
        $currentresult->team = $racerlists->所属;/*チーム*/

        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }
    }

    public function getPrevRacer(Request $request/*, $id*/)
    {
        $currentresult = CurrentResult::first();

        $start_no = $currentresult->start;
        //条件
        $sex = $currentresult->sex;
        $season = $currentresult->season;
        $codex = $currentresult->codex;
        /*
        $total = Racerlist::select()
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->where('start','>',0)
            ->count();
        */
        $start_no = $start_no - 1;
        if($start_no<=0){
            $start_no = 1;
        }
    
        $racerlists = Racerlist::select('sex','season','codex','start', 'BIB', 'SAJNO', 'FISNO', '氏名漢', '県連盟', '所属')
            ->where('start',$start_no)
            ->where('sex',$sex)
            ->where('season',$season)
            ->where('codex',$codex)
            ->first();

        $currentresult->sex = $racerlists->sex;/*性別*/
        $currentresult->season = $racerlists->season;/*シーズン*/
        $currentresult->codex = $racerlists->codex;/*CODEX*/
        $currentresult->sajno = $racerlists->SAJNO;/*SAJ NO*/
        $currentresult->start = $racerlists->start;/*スタートNo*/
        $currentresult->name = $racerlists->氏名漢;/*選手名*/
        $currentresult->bib = $racerlists->BIB;/*BIB*/

        $currentresult->pref = $racerlists->県連盟;/*県連*/
        $currentresult->team = $racerlists->所属;/*チーム*/

        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }
     }

    public function testinsert(){
        $currentresult = CurrentResult::first();

        $base_rnd = mt_rand(8,17);
        $base_range = mt_rand($base_rnd,$base_rnd+2);

        $currentresult->turnB1 = mt_rand($base_rnd,$base_rnd+2) +  mt_rand(0,9)/10;
        $currentresult->turnB2 = mt_rand($base_rnd,$base_rnd+2) +  mt_rand(0,9)/10;
        $currentresult->turnB3 = mt_rand($base_rnd,$base_rnd+2) +  mt_rand(0,9)/10;
        $currentresult->turnB4 = mt_rand($base_rnd,$base_rnd+2) +  mt_rand(0,9)/10;
        $currentresult->turnB5 = mt_rand($base_rnd,$base_rnd+2) +  mt_rand(0,9)/10;
        
        $base_rnd = mt_rand(0,6);
        $base_range = mt_rand(0,9);

        $currentresult->turnD1 = $base_rnd + mt_rand(0,9)/10;
        $currentresult->turnD2 = $base_rnd + mt_rand(0,9)/10;
        $currentresult->turnD3 = $base_rnd + mt_rand(0,9)/10;
        $currentresult->turnD4 = $base_rnd + mt_rand(0,9)/10;
        $currentresult->turnD5 = $base_rnd + mt_rand(0,9)/10;


        $row_count = MogulAirDd::select()->count();
        $codelist = MogulAirDd::select()->get();
        $base_rnd = mt_rand(1,30);

        $codelist = $codelist[$base_rnd];

        $currentresult->air11 = $codelist->code;
        $currentresult->air21 = $currentresult->air11;

        $base_rnd = mt_rand(1,$row_count-1);

        $codelist = MogulAirDd::select()->get();
        $codelist = $codelist[$base_rnd];

        $currentresult->air12 = $codelist->code;
        $currentresult->air22 = $currentresult->air12;


        $base_rnd = mt_rand(3,8);
        $base_range = mt_rand($base_rnd,$base_rnd+1);

        $currentresult->air1_1 = mt_rand($base_rnd,$base_rnd+1) + mt_rand(0,9)/10;
        $currentresult->air2_1 = mt_rand($base_rnd,$base_rnd+1) + mt_rand(0,9)/10;

        $base_rnd = mt_rand(3,8);
        $base_range = mt_rand($base_rnd,$base_rnd+1);

        $currentresult->air1_2 = mt_rand($base_rnd,$base_rnd+1) + mt_rand(0,9)/10;
        $currentresult->air2_2 = mt_rand($base_rnd,$base_rnd+1) + mt_rand(0,9)/10;

        $base_rnd = mt_rand(22,30);
        $base_range = mt_rand(0,99);

        $currentresult->sec = $base_rnd + $base_range/100;
        //$currentresult->time = "16.85";
        $currentresult->update();
        return view('headjudge',['judge_order' => $user->name, 'currentresult' => $currentresult]);        
    }

}
