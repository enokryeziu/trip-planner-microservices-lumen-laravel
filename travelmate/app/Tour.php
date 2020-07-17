<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table = "tour";
    protected $fillable = [
        'start_at', 'end_at', 'user_id'
    ];
}
