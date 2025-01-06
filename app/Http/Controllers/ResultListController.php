<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CurrentResultController;
use App\Models\CurrentResult;
use App\Models\ResultList;
use Illuminate\Http\Request;
use Auth;

class ResultListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        $currentresult = CurrentResult::first();
        $resultlist = new ResultList;

        $resultlist->sex = $currentresult->sex; /*性別*/
        $resultlist->class = $currentresult->class; /*クラス*/
        $resultlist->season = $currentresult->season; /*シーズン*/
        $resultlist->codex = $currentresult->codex; /*CODEX*/
        $resultlist->sajno = $currentresult->sajno; /*SAJ NO*/
        $resultlist->start = $currentresult->start; /*スタートNo*/
        if($currentresult->start==null){
            $resultlist->start = $currentresult->id; /*スタートNo*/
        }

        $resultlist->rank = 0; /*順位*/
        $resultlist->name = $currentresult->name; /*選手名*/
        $resultlist->bib = $currentresult->bib; /*BIB*/
        $resultlist->pref = $currentresult->pref; /*県連*/
        $resultlist->team = $currentresult->team; /*チーム*/
        $resultlist->score = $currentresult->score; /*トータルスコア*/
        $resultlist->turn = $currentresult->turn; /*ターンスコア*/
        $resultlist->air = $currentresult->air; /*エアスコア*/
        $resultlist->air1 = $currentresult->air1; /*A1 技名*/
        $resultlist->air2 = $currentresult->air2; /*A2 技名*/
        $resultlist->sec = $currentresult->sec; /*タイム*/

        $resultlist->turnB1 = $currentresult->turnB1; /*ターンスJ1 ベース*/
        $resultlist->turnD1 = $currentresult->turnD1; /*ターンスJ1 減点*/
        $resultlist->turnB2 = $currentresult->turnB2; /*ターンスJ2 ベース*/
        $resultlist->turnD2 = $currentresult->turnD2; /*ターンスJ2 減点*/
        $resultlist->turnB3 = $currentresult->turnB3; /*ターンスJ3 ベース*/
        $resultlist->turnD3 = $currentresult->turnD3; /*ターンスJ3 減点*/
        $resultlist->turnB4 = $currentresult->turnB4; /*ターンスJ4 ベース*/
        $resultlist->turnD4 = $currentresult->turnD4; /*ターンスJ4 減点*/
        $resultlist->turnB5 = $currentresult->turnB5; /*ターンスJ5 ベース*/
        $resultlist->turnD5 = $currentresult->turnD5; /*ターンスJ5 減点*/

        $resultlist->air1_1 = $currentresult->air1_1; /*A1-1 ポイント*/
        $resultlist->air1_2 = $currentresult->air1_2; /*A1-2 ポイント*/
        $resultlist->air2_1 = $currentresult->air2_1; /*A2-1 ポイント*/
        $resultlist->air2_2 = $currentresult->air2_2; /*A2-2 ポイント*/
        $resultlist->time = $currentresult->time; /*タイムポイント*/

        $resultlist->air1_dd = $currentresult->air1_dd; /*A1 難度*/
        $resultlist->air2_dd = $currentresult->air2_dd; /*A2 難度*/

        $resultlist->tiebreak = 0; /**/

        $resultlist->didnot = $currentresult->didnot; /*DNS/DNF/DSQフラグ*/
        $resultlist->status = $currentresult->status; /*有効無効フラグ*/

        $resultlist->delete = false; /*有効無効フラグ*/

        /*DNS/DSQ/DNF*/
        if($currentresult->didnot =='DNS' || $currentresult->didnot=='DNF' || $currentresult->didnot=='DSQ' ){
            $currentresult->score = $currentresult->didnot;
            $resultlist->air1 = "-"; /*A1 技名*/
            $resultlist->air2 = "-"; /*A2 技名*/
            $resultlist->sec = 0; /*タイム*/
            $resultlist->turnB1 = 0; /*ターンスJ1 ベース*/
            $resultlist->turnD1 = 0; /*ターンスJ1 減点*/
            $resultlist->turnB2 = 0; /*ターンスJ2 ベース*/
            $resultlist->turnD2 = 0; /*ターンスJ2 減点*/
            $resultlist->turnB3 = 0; /*ターンスJ3 ベース*/
            $resultlist->turnD3 = 0; /*ターンスJ3 減点*/
            $resultlist->turnB4 = 0; /*ターンスJ4 ベース*/
            $resultlist->turnD4 = 0; /*ターンスJ4 減点*/
            $resultlist->turnB5 = 0; /*ターンスJ5 ベース*/
            $resultlist->turnD5 = 0; /*ターンスJ5 減点*/
    
            $resultlist->air1_1 = 0; /*A1-1 ポイント*/
            $resultlist->air1_2 = 0; /*A1-2 ポイント*/
            $resultlist->air2_1 = 0; /*A2-1 ポイント*/
            $resultlist->air2_2 = 0; /*A2-2 ポイント*/
            $resultlist->time = 0; /*タイムポイント*/
    
            $resultlist->air1_dd = 0; /*A1 難度*/
            $resultlist->air2_dd = 0; /*A2 難度*/
            }

    
        $resultlist->save();


        //スコア関連をクリア
        $currentresult->score = null; /*トータルスコア*/
        $currentresult->turn = null; /*ターンスコア*/
        $currentresult->air = null; /*エアスコア*/
        $currentresult->air1 = null; /*A1 技名*/
        $currentresult->air2 = null; /*A2 技名*/
        $currentresult->sec = null; /*タイム*/

        $currentresult->turnB1 = null; /*ターンスJ1 ベース*/
        $currentresult->turnD1 = null; /*ターンスJ1 減点*/
        $currentresult->turnB2 = null; /*ターンスJ2 ベース*/
        $currentresult->turnD2 = null; /*ターンスJ2 減点*/
        $currentresult->turnB3 = null; /*ターンスJ3 ベース*/
        $currentresult->turnD3 = null; /*ターンスJ3 減点*/
        $currentresult->turnB4 = null; /*ターンスJ4 ベース*/
        $currentresult->turnD4 = null; /*ターンスJ4 減点*/
        $currentresult->turnB5 = null; /*ターンスJ5 ベース*/
        $currentresult->turnD5 = null; /*ターンスJ5 減点*/

        $currentresult->air1_1 = null; /*A1-1 ポイント*/
        $currentresult->air1_2 = null; /*A1-2 ポイント*/
        $currentresult->air2_1 = null; /*A2-1 ポイント*/
        $currentresult->air2_2 = null; /*A2-2 ポイント*/
        $currentresult->time = null; /*タイムポイント*/

        $currentresult->air1_dd = null; /*A1 難度*/
        $currentresult->air2_dd = null; /*A2 難度*/
        $currentresult->air11 = null; /*A1 技名*/
        $currentresult->air12 = null; /*A2 技名*/
        $currentresult->air21 = null; /*A1 技名*/
        $currentresult->air22 = null; /*A2 技名*/


        $currentresult->didnot = null; /*DNS/DNF/DSQフラグ*/
        $currentresult->status = null; /*有効無効フラグ*/

        $currentresult->update();

        if (isset($currentresult) && $currentresult) {
            return $currentresult;
        } else {
            return null;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($raceclass, $sex)
    {
        $user = Auth::user();
        $id = Auth::id();
        //条件
        $sex = $sex;
        //$season = $request->input('season');
        //$codex = $request->input('codex');
        $class = $raceclass;
        //
        $user = Auth::user();
        $id = Auth::id();
        $resultlist = ResultList::select('start', 'bib', 'name', 'pref', 'team', /*'didnot',*/ 'score', 'turn', 'air', 'air1', 'air2', 'sec', 'time', 'tiebreak')
            ->where('didnot', "")
            ->orWhere('didnot', null)
            ->where('sex',$sex)
            ->where('class',$raceclass)
            //->where('season',$season)
            //->where('codex',$codex)
            ->orderBy('score', 'desc')
            ->orderBy('turn', 'desc')
            ->orderBy('air', 'desc')
            ->orderBy('sec', 'desc')
            ->orderBy('sec', 'desc')
            ->get();

        $nonclasslist = ResultList::select('start', 'bib', 'name', 'pref', 'team', /*'didnot',*/ 'score'/* 'turn', 'air', 'air1', 'air2', 'sec', 'time', 'tiebreak'*/)
            ->whereIn('didnot', ["DNS","DNF","DSQ"])
            ->where('sex',$sex)
            ->where('class',$raceclass)
            //->where('season',$season)
            //->where('codex',$codex)
            ->orderBy('didnot', 'asc')
            ->orderBy('start', 'asc')
            ->get();

        return view('resultlist',[
            'judge_order' => $user->name,
            'title' => "リザルト",
            'resultlist' => $resultlist,
            'sex' => $sex,
            'raceclass' => $raceclass,
            'nonclasslist' => $nonclasslist,
        ]);


/*
        if (isset($racerlists) && $racerlists) {
            return $racerlists;
        } else {
            return null;
        }
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getresult(Request $request)
    {
        //条件
        $sex = $request->input('sex');
        $season = $request->input('season');
        $codex = $request->input('codex');
        $class = $request->input('class');

        $resultlist = ResultList::select('start', 'bib', 'name', 'pref', 'team', 'didnot', 'score', 'turn', 'air', 'air1', 'air2', 'sec', 'time', 'tiebreak')
            ->where('sex',$sex)
            ->where('class',$class)
            //->where('season',$season)
            //->where('codex',$codex)
            ->orderBy('score', 'desc')
            ->orderBy('turn', 'desc')
            ->orderBy('air', 'desc')
            ->orderBy('sec', 'desc')
            ->orderBy('sec', 'desc')
            ->get();
        if (isset($resultlist) && $resultlist) {
            return $resultlist;
        } else {
            return null;
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
