<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
            'user_id',
            'name',
            'contract',
            'siconv',
            'siafi',
            'year',
            'action',
            'value',
            'value_free',
            'status',
            'ult_medition',
            'object',
            'status_contract',
            'adjudication',

            'propose_number',
            'account_repass',
            'repass_value',
            'organ',
            'convain_vigence',
            'position',
            'execution_fis',
            'execution_finan',

            'licitation_number',
            'spreadsheet_winner',
            'edital_publication',
            'homologation',
            'declaration',
            'publication',

            'company',
            'cnpj',
            'assignature_date',
            'vigence_company',
            'term_additive',
            'counterpart_value',
            'original_number',
            'super_organ',
            'grantor',
            'vigence_init',
            'vigence_end',
            'convain_publication',

            'bond',
            'prefecture_id',
            'type_work'
    ];

    /**
     * Return permissions to work.
     *
     * @return Collection
     */
    public function permissions()
    {
        return $this->belongsTo('App\Permission');
    }
    
    /**
     * Return account to work.
     *
     * @return Collection
     */
    public function account()
    {
        return $this->hasOne('App\Account');
    }

    /**
     * Return transfers to work.
     *
     * @return Collection
     */
    public function transfers()
    {
        return $this->hasMany('App\Transfer');
    }

    /**
     * Return users to work, with pivot table.
     *
     * @return Collection
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'permissions',  'work_id', 'user_id')->withPivot('type');
    }

    /**
     * Return financials to work.
     *
     * @return Collection
     */
    public function financials()
    {
        return $this->hasMany('App\Financial');
    }

    /**
     * Return reports to work.
     *
     * @return Collection
     */
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    /**
     * Return prefecture.
     *
     * @return Collection
     */
    public function prefecture()
    {
        return $this->hasOne('App\Prefecture');
    }

     /**
     * Set the value default for work.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $value? $value: 0.0;
    }

    /**
     * Set the repass value default for work.
     *
     * @param  string  $repass_value
     * @return void
     */
    public function setRepassValueAttribute($repass_value)
    {
        $this->attributes['repass_value'] = $repass_value? $repass_value: 0.0;
    }

    /**
     * Set the execution fis default for work.
     *
     * @param  string  $execution_fis
     * @return void
     */
    public function setExecutionFisAttribute($execution_fis)
    {
        $this->attributes['execution_fis'] = $execution_fis? $execution_fis: 0.0;
    }

    /**
     * Set the execution finan default for work.
     *
     * @param  string  $execution_finan
     * @return void
     */
    public function setExecutionFinanAttribute($execution_finan)
    {
        $this->attributes['execution_finan'] = $execution_finan? $execution_finan: 0.0;
    }
    

    /**
     * Set the spreadsheet winner default for work.
     *
     * @param  string  $spreadsheet_winner
     * @return void
     */
    public function setSpreadsheetWinnerAttribute($spreadsheet_winner)
    {
        $this->attributes['spreadsheet_winner'] = $spreadsheet_winner? $spreadsheet_winner: 0.0;
    }

    
    /**
     * Set the value free default for work.
     *
     * @param  string  $value_free
     * @return void
     */
    public function setValueFreeAttribute($value_free)
    {
        $this->attributes['value_free'] = $value_free? $value_free: 0.0;
    }

    /**
     * Set the counterpart value default for work.
     *
     * @param  string  $counterpart_value
     * @return void
     */
    public function setCounterpartValueAttribute($counterpart_value)
    {
        $this->attributes['counterpart_value'] = $counterpart_value? $counterpart_value: 0.0;
    }
}
