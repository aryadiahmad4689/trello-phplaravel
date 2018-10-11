<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $board = Board::where('user_id','=',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.board',['boards'=>$board]);

    }

     public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}

