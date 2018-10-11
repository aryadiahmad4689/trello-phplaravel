<?php

namespace App;
use App\Card;
use App\Board;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function card()
    {
    	return $this->hasMany(Card::class)->orderBy('id','DESC');
    }

     public function board()
    {
    	return $this->belongsTo(Board::class);
    }
}
