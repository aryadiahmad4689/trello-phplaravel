<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Board extends Model
{

    protected $fillable= [

    	'user_id',
    	'title_board'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

}
