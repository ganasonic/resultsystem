<?php

namespace App\Http\Controllers;

use App\Models\HeadJudge;
use Illuminate\Http\Request;
use Auth;
use Config;

class HeadJudgeController extends Controller
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
     * @param  \App\HeadJudge  $headJudge
     * @return \Illuminate\Http\Response
     */
    public function show(HeadJudge $headJudge)
    {
        //return view('headjudge');
        $user = Auth::user();
        $id = Auth::id();
        return view('headjudge',['judge_order' => $user->name,]);
    }

    public function timeinput(HeadJudge $headJudge)
    {
        $menu = Config::get('menu.numbermenu');
        //
        $user = Auth::user();
        $id = Auth::id();
        return view('timeinput',['judge_order' => $user->name,'title' => "ホーム",'menu' => $menu]);
        //return view('timeinput');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeadJudge  $headJudge
     * @return \Illuminate\Http\Response
     */
    public function edit(HeadJudge $headJudge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeadJudge  $headJudge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeadJudge $headJudge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HeadJudge  $headJudge
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeadJudge $headJudge)
    {
        //
    }
}
