<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Financial model entity  
 *
 * @package    amado-eng
 * @subpackage App
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Financial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'work_id', 'n_nf','emission','total_value', 'dam_iss', 'ir', 'vlr', 'ted_date', 'ted_value', 'pr','dli'
    ];

    /**
     * Return work to financial.
     *
     * @return Collection
     */
    public function work()
    {
        $this->belongsTo('App\Work');
    }
}
