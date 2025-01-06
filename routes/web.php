<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*設定画面*/
Route::get('/setting', 'SettingController@show')->name('setting');
/*
Route::get('setting', function () {
    return view('setting');
});*/

/*ターンジャッジ画面*/
Route::get('/turnjudge', 'TurnJudgeController@show')->name('turnjudge');

/*エアジャッジ画面*/
Route::get('/airjudge', 'AirJudgeController@show')->name('airjudge');

/*ヘッドジャッジ画面*/
Route::get('/headjudge', 'HeadJudgeController@show')->name('headjudge');

/*DMヘッドジャッジ画面*/
Route::get('/dmheadjudge', 'DmController@show')->name('dmheadjudge');

/*タイム入力画面*/
Route::get('/timeinput', 'HeadJudgeController@timeinput')->name('timeinput');

/*レース選択画面*/
Route::get('/selectrace', 'SelectRaceController@selectrace')->name('selectrace');
Route::get('/processrace/{raceclass}/{sex}', 'SelectRaceController@processrace')->name('processrace');

/*リスト表示画面*/
Route::get('/selectlist', 'SelectRaceController@selectlist')->name('selectlist');

/*リザルト表示画面*/
Route::get('/resultindex', 'ResultIndexController@show')->name('resultindex');
Route::get('/resultlist/{raceclass}/{sex}', 'ResultListController@index')->name('index');

/*大会情報画面*/
Route::get('/raceinformation', 'RaceInformationController@show')->name('raceinformation');
Route::get('/getAllPaceInfo', array('as' => 'getAllPaceInfo', 'uses' => 'RaceInformationController@getAllPaceInfo'));
Route::get('/setJudgeNum', array('as' => 'setJudgeNum', 'uses' => 'RaceInformationController@setJudgeNum'));
Route::get('/getJudgeNum', array('as' => 'getJudgeNum', 'uses' => 'RaceInformationController@getJudgeNum'));

/*ホーム*/
Route::get('/homes', 'HomeController@home')->name('homes');

Auth::routes();

/*ログイン（自動生成）*/
Route::get('/home', 'HomeController@index')->name('home');

/*ログアウト*/
Route::get('/logout', 'HomeController@logout')->name('logout');



/*ポイントリスト*/
Route::get('/pointlist/m', 'PointListController@racer_m')->name('pointlist');
Route::get('/pointlist/f', 'PointListController@racer_f')->name('pointlist');

/*スタートリスト*/
Route::get('/startlist', 'RacerListController@startlist')->name('startlist');
Route::get('/startlist/m', 'RacerListController@start_m')->name('racerlist');
Route::get('/startlist/f', 'RacerListController@start_f')->name('racerlist');

Route::get('/createFinal1StartList', 'RacerListController@createFinal1StartList')->name('createFinal1StartList');
Route::get('/createFinal1StartList', 'RacerListController@createFinal1StartList')->name('createFinal1StartList');
Route::get('/createFinal2StartList', 'RacerListController@createFinal2StartList')->name('createFinal2StartList');


/*エントリーリスト*/
Route::get('/entrylist/m', 'RacerListController@entry_m')->name('racerlist');
Route::get('/entrylist/f', 'RacerListController@entry_f')->name('racerlist');

/*スタートリストのドロー*/
Route::get('/setdraw', 'RacerListController@setdraw')->name('setdraw');

Route::group(['prefix'=>'currentresult'], function () {
    //Route::get('index' 'CurrentResultController@index')->name('currentresult.index');
    Route::get('create', 'CurrentResultController@create')->name('currentresult.create');
    Route::post('store', 'CurrentResultController@store')->name('currentresult.store');
    Route::get('show/{id}', 'CurrentResultController@show')->name('currentresult.show');
    Route::get('getcurrent', array('as' => 'getcurrent', 'uses' => 'CurrentResultController@getcurrent'));
    Route::get('getcurrentracer', array('as' => 'getcurrentracer', 'uses' => 'CurrentResultController@getcurrentracer'));
    Route::get('getNextRacer', array('as' => 'getNextRacer', 'uses' => 'CurrentResultController@getNextRacer'));
    Route::get('getPrevRacer', array('as' => 'getPrevRacer', 'uses' => 'CurrentResultController@getPrevRacer'));
    Route::get('getPacetime', array('as' => 'getPacetime', 'uses' => 'CurrentResultController@getPacetime'));
    Route::post('postcurrent', array('as' => 'postcurrent', 'uses' => 'CurrentResultController@postcurrent'));
    Route::post('setStatus', array('as' => 'setStatus', 'uses' => 'CurrentResultController@setStatus'));
    
    Route::get('edit/{id}', 'CurrentResultController@edit')->name('currentresult.edit');
    //Route::post('update', 'CurrentResultController@update')->name('currentresult.update');
    Route::post('testinsert', array('as' => 'testinsert', 'uses' => 'CurrentResultController@testinsert'));

  });
  

  Route::group(['prefix'=>'currentdmresult'], function () {
    Route::get('create', 'DmController@create')->name('currentresult.create');
    Route::get('store', 'DmController@store')->name('currentresult.store');
    Route::get('getcurrent', array('as' => 'getcurrent', 'uses' => 'DmController@getcurrent'));
    Route::post('postcurrent', array('as' => 'postcurrent', 'uses' => 'DmController@postcurrent'));
    Route::post('setStatus', array('as' => 'setStatus', 'uses' => 'DmController@setStatus'));
  });
  

Route::resource('/upload', 'UploadController');
//Route::resource('/uploadlist', 'UploadController@store');
Route::post('/uploadlist', 'UploadController@store')->name('uploadlist');
Route::post('/register', 'HomeController@logout')->name('logout');

Route::get('/test', 'HomeController@test')->name('test');

//スタートリスト＆進行
Route::get('/getStart', 'RacerListController@getStart')->name('getStart');
Route::get('/currentresult/update/', 'CurrentResultController@update')->name('currentresult.update');

Route::post('/result/insert', array('as' => 'insert', 'uses' => 'ResultListController@insert'));
Route::get('/getresult', 'ResultListController@getresult')->name('getresult');


