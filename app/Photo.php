<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['path'];

    protected $uploads = '/images/';

    public function imageable(){
        return $this->morphTo();
    }

    public function getPathAttribute($photo){
        return $this->uploads.$photo;
    }

}
