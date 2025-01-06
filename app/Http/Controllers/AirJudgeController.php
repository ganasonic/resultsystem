<?php

namespace App\Http\Controllers;

use App\Models\AirJudge;
use Illuminate\Http\Request;
use Auth;

class AirJudgeController extends Controller
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
     * @param  \App\AirJudge  $airJudge
     * @return \Illuminate\Http\Response
     */
    public function show(AirJudge $airJudge)
    {
        //return view('airjudge');
        $user = Auth::user();
        $id = Auth::id();
        return view('airjudge',['judge_order' => $user->name,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirJudge  $airJudge
     * @return \Illuminate\Http\Response
     */
    public function edit(AirJudge $airJudge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirJudge  $airJudge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirJudge $airJudge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirJudge  $airJudge
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirJudge $airJudge)
    {
        //
    }
}
