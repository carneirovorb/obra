<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Permission model pivot entity  
 *
 * @package    amado-eng
 * @subpackage App
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'work_id', 'user_id', 'type'
    ];

    /**
     * Return work to permission.
     *
     * @return Collection
     */
    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    /**
     * Return user to financial.
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
