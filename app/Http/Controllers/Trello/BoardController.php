<?php

namespace App\Http\Controllers\Trello;

use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Http\Controllers\Controller;
use App\Board;
use App\Post;
use App\Card;
use Auth;

class BoardController extends Controller
{
    // public function index()
    // {
    // 	$board = Board::orderBy('id','ASC')->get();
    // 	return view('admin.board',['boards'=>$board]);

    // }

     public function showDetail($id)
    {
    	$boardDetail = Board::findOrFail($id);    

        // $data =  Post::where('board_id','=',$id)->first(); 
      
       // $datas=$data->card;
        $dropDown = Post::where('board_id',$id)->get();
        // dd($dropDown);
       $dataa = Card::orderBy('id','DESC')->get(); 
        // dd($data);
    	return view('admin.post',['board'=>$boardDetail,'dataCard' => $dataa,'dropdowns' => $dropDown]);
    
    }

    public function store(Request $request)
    {

    	$insert = Board::create([
    		'user_id' => Auth::User()->id,
    		'title_board' => $request->title
    	]);

    	return redirect('/home');

    }
}
