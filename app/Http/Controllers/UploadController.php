<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RacerlistsImport;
use App\Imports\MogulAirDdsImport;
use App\Imports\RaceInfoParamImport;

use Auth;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if($user->name == "admin"){
            return view('upload',['judge_order' => $user->name,'title' => "アップロード"]);
        }
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
        //デフォルトでは/storage/app/に保存される
        //$request->file('file')->storeAs('', 'upload_file.xlsx');

        //DBに登録する
		$uploadkind = $request->input('uploadkind');
		$file = $request->file('file');
        if($uploadkind=='racerlist'){
            Excel::import(new RacerlistsImport, $file);
        }elseif($uploadkind=='airdd'){
            Excel::import(new MogulAirDdsImport, $file);
        }elseif($uploadkind=='raceinfo'){
            Excel::import(new RaceInfoParamImport, $file);
        }
        $user = Auth::user();
        $id = Auth::id();
        if($user->name == "admin"){
            return view('upload',['judge_order' => $user->name,'title' => "アップロード"]);
        }
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
