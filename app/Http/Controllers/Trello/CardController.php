<?php

namespace App\Http\Controllers\Trello;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use App\Post;
use App\Board;

class CardController extends Controller
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
    public function store(Request $request,$id)
    {
        $card = new Card;
        $card->post_id = $id;
        $card->title_card= $request->title;
        $card->save();

        $boardId = Post::findOrFail($id);
        $data = $boardId->board->id;


        return redirect()->route('show-board-detail',$data);

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
            $editt = Card::findOrFail($id);
            $edittt = Card::findOrFail($id);
             $postId = Post::where('id','=',$editt->post_id)->first();



              $cardChild = Card::findOrFail($id);
              $idPost = Post::find($cardChild)->first();
              $dta = Post::find($postId->id);





            return view('admin.edit',['data'=>$editt,'options' => $idPost]);
            // $d =$postId->board_id;
            // $idp =  Post::where('board_id','=',$d)->first();
            // kalau di atas kuambil berdasarkan boar dulu
            // $dataOptionPost = Post::all();
            // // angka 58 cardad

                       
            // nda bisaka ini di jadikan patokan
            // mislakan board 8 sya ingin menampilkan id yg hanya ada board 8 begitu

            // $postChil = Post::findOrFail($cardChild)->first();
            // $dataBoardOption = $postChil->board;
            // dd($dataBoardOption); kalau mw ambil board_id harus melalui relasi ok\sebentar sekali
 
           
            
            // $posts = Post::where('id','=',$postId)->get();
            // $postA = Post::find($posts)->first();

            // $postsId = $postA->board_id;
            
            // $edt = Card::find($edtcard)->first();

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
        $updateCard = Card::findOrFail($id);
        $updateCard->title_card = $request->title;
        $updateCard->save();

        $idPost = Post::find($updateCard)->first();
              $dta = Post::find($idPost->id);
              $boardID = $dta->board_id;
        return redirect()->route('show-board-detail',$boardID);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove = Card::findOrFail($id);
        $remove->delete();

            
        $cardRemove = Post::find($remove)->first();
        $cardDle=$cardRemove->board_id; 

        return redirect()->route('show-board-detail',$cardDle);

    }

    public function move($idpost,$idcard)
    {
        $move = Card::findOrFail($idcard);
        $move->post_id = $idpost;
        $move->save();

        $idPost = Post::find($move)->first();
              $dta = Post::find($idPost->id);
              $boardID = $dta->board_id;

        return redirect()->route('show-board-detail',$boardID);
    }
}