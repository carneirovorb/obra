<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Transfer model entity  
 *
 * @package    amado-eng
 * @subpackage App
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Transfer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'work_id',
        'parcel',
        'amount_received',
        'status',
        'inclusion_date',
        'ob_number',
        'ob_date',
        'value_rec',
        'value_paid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Return work to transfer.
     *
     * @return Collection
     */
    public function work()
    {
        return $this->belongsTo('App\Work');
    }
}
