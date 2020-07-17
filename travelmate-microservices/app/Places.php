<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    public $table = "places";
    protected $fillable = ['name', 'type_id', 'description','address','city_id'];
    
    public function city() {
        return $this->belongsTo(City::class);
    }
}