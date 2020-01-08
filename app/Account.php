<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Account model entity  
 *
 * @package    amado-eng
 * @subpackage App
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'work_id',
        'bank_name',
        'agency',
        'account_number',
        'contracted_bank_name',
        'contracted_agency',
        'contracted_account',
        'pendency'
    ];

    /**
     * Return work to account.
     *
     * @return Collection
     */
    public function work()
    {
        return $this->belongsTo('App\Work');
    }
}
