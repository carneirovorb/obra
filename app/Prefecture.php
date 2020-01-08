<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = ['id', 'name'];

    public function works()
    {
        return $this->belongsTo('App\Work');
    }
}
