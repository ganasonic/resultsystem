<?php

namespace App\Http\Controllers;

use App\Models\ResultIndex;
use Illuminate\Http\Request;
use Auth;
use Config;

class ResultIndexController extends Controller
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
     * @param  \App\ResultIndex  $resultIndex
     * @return \Illuminate\Http\Response
     */
    public function show(ResultIndex $resultIndex)
    {
        //
        $user = Auth::user();
        $id = Auth::id();
        $menuq = Config::get('menu.resultmenuq');
        $menuf = Config::get('menu.resultmenuf');
        return view('resultindex',
            [
                'judge_order' => $user->name,
                'title' => "リザルト表示",
                'menuq' => $menuq,
                'menuf' => $menuf,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResultIndex  $resultIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultIndex $resultIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResultIndex  $resultIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultIndex $resultIndex)
    {
        //
    }
}
