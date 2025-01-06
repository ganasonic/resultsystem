<?php

namespace App\Http\Controllers;

use App\Models\RaceInformation;
use Illuminate\Http\Request;
use Auth;

class RaceInformationController extends Controller
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
     * @param  \App\RaceInformation  $raceInformation
     * @return \Illuminate\Http\Response
     */
    public function show(RaceInformation $raceInformation)
    {
        //
        $user = Auth::user();
        $id = Auth::id();
        $raceinfo = RaceInformation::all();
        return view('raceinformation',['judge_order' => $user->name,'title' => "大会情報",'raceinfo' => $raceinfo, 'user' => $user]);
    }

    public function getAllPaceInfo()
    {
        //
        $raceinfo = RaceInformation::all();
        if (isset($raceinfo) && $raceinfo) {
            return $raceinfo;
        } else {
            return null;
        }
    }

    public function setJudgeNum(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $judgenum = $request->input('judgenum');
        RaceInformation::where('name','judgenum')->update(['value' => $judgenum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RaceInformation  $raceInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RaceInformation $raceInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RaceInformation  $raceInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RaceInformation $raceInformation)
    {
        //
    }
}
