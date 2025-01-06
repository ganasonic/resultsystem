<?php

namespace App\Http\Controllers;

use App\Models\TurnJudge;
use Illuminate\Http\Request;
use Auth;
use Config;

class TurnJudgeController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\TurnJudge  $turnJudge
     * @return \Illuminate\Http\Response
     */
    public function show(TurnJudge $turnJudge)
    {
        $menu = Config::get('menu.numbermenu');
        //return view('turnjudge');
        $user = Auth::user();
        $id = Auth::id();
        return view('turnjudge',['judge_order' => $user->name,'title' => "ホーム",'menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurnJudge  $turnJudge
     * @return \Illuminate\Http\Response
     */
    public function edit(TurnJudge $turnJudge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurnJudge  $turnJudge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TurnJudge $turnJudge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurnJudge  $turnJudge
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurnJudge $turnJudge)
    {
        //
    }
}
