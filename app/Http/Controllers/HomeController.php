<?php

namespace App\Http\Controllers;

use App\Models\RaceInformation;
use Illuminate\Http\Request;
use Auth;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $discipline = RaceInformation::where('name',"discipline")->value('value');
        $menu = Config::get('menu.numbermenu');

        if (($user->name == "turn1")||($user->name == "turn2")||($user->name == "turn3")||($user->name == "turn4")||($user->name == "turn5")){
            if($discipline=="DM"){
                return view('dmjudge',['judge_order' => $user->name,'title' => "ターンジャッジ",'menu' => $menu, 'judge' => 'turn']);
            }
            return view('turnjudge',['judge_order' => $user->name,'title' => "ターンジャッジ",'menu' => $menu]);
            
        }elseif (($user->name == "air1")||($user->name == "air2")){
            if($discipline=="DM"){
                return view('dmjudge',['judge_order' => $user->name,'title' => "エアジャッジ",'menu' => $menu, 'judge' => 'air']);
            }
            return view('airjudge',['judge_order' => $user->name,'title' => "エアジャッジ",]);

        }elseif ($user->name == "head"){
            if($discipline=="DM"){
                return view('dm_headjudge',['judge_order' => $user->name,'title' => "ヘッドジャッジ",'menu' => $menu, 'judge' => 'air']);
            }
            return view('headjudge',['judge_order' => $user->name,]);

        }elseif ($user->name == "time"){
            return view('timeinput',['judge_order' => $user->name,'title' => "タイム",'menu' => $menu]);

        }elseif ($user->name == "speed"){
                return view('dmjudge',['judge_order' => $user->name,'title' => "スピードジャッジ",'menu' => $menu, 'judge' => 'speed']);

        }elseif ($user->name == "overall"){
            return view('dmjudge',['judge_order' => $user->name,'title' => "オーバーオール",'menu' => $menu, 'judge' => 'overall']);

        }elseif ($user->name == "admin"){
            $menu1 = Config::get('menu.homemenu1');
            $menu2 = Config::get('menu.homemenu2');
            $menu3 = Config::get('menu.homemenu3');

            return view('home',
                [
                    'judge_order' => $user->name,
                    'title' => "ホーム",
                    'menu1' => $menu1,
                    'menu2' => $menu2,
                    'menu3' => $menu3,
                ]);
        }else{
            Auth::logout();
            return view('welcome');
        }
    }

    public function test()
    {
        $user = Auth::user();
        $id = Auth::id();
        return view('test',['judge_order' => $user->name,'title' => "テスト"]);
    }

    public function home()
    {
        Auth::logout();
        return view('welcome');
    }
    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
