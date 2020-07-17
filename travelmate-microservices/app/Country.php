<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = "country";
    protected $fillable = ['code', 'name', 'continet_name'];
}