<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public $timestamps = false;
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'ticket', 'image', 'question', 'answers', 'correct', 'tip', 'token'
    ];
}
