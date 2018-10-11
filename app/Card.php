<?php

namespace App;
use App\Post;
use App\Board;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	protected $fillable =[
	'post_id',
	'title_card'];


     public function posts()
    {
    	return $this->belongsTo(Post::class);
    }

    public function board()
    {
    	return $this->belongsTo(Board::class);
    }
}
