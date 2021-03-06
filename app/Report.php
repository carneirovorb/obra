<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Report model entity  
 *
 * @package    amado-eng
 * @subpackage App
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'work_id', 'file_name' , 'file_date', 'file_description'
    ];

    /**
     * Return work to report.
     *
     * @return Collection
     */
    public function work()
    {
        $this->belongsTo('App\Work');
    }
}
