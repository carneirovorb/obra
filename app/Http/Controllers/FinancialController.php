<?php

namespace App\Http\Controllers;

use App\Financial;
use App\Work;
use App\Traits\CheckPrivilege;
use App\Utils\Message;
use Illuminate\Http\Request;

/**
 * Controller for Work resource  
 *
 * Business logic.
 *
 * @package    amado-eng
 * @subpackage App\Http\Controllers
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class FinancialController extends Controller
{
    use CheckPrivilege;
    
    /**
     * Display a listing of the resource.
     * 
     * @param int $work_id
     * @return \Illuminate\Http\Response
     */
    public function index(int $work_id)
    {
        $financials = Work::find($work_id)->financials()->get();
        $type = $this->privilege($work_id);
        return view('works.financial.index', compact('financials', 'work_id','type'));
    }

     /**
     * Replace money mask.
     *
     * @param  array  $data
     * @return array  $data
     */
    private function replace(array $data) : array
    {
        $data['total_value'] = str_replace(",", "", $data['total_value']);
        $data['vlr'] = str_replace(",", "", $data['vlr']);
        $data['ted_value'] = str_replace(",", "", $data['ted_value']);
        return $data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  int $work_id
     * @return \Illuminate\Http\Response
     */
    public function create(int $work_id)
    {
        return view('works.financial.create', compact('work_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $financial = new Financial;
        $data = $this->replace($request->all());
        $financial->fill($data)->save();
        return redirect('works')->with('status', Message::success("Cadastro", "resumo financeiro"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $work_id
     * @param  int $financial_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $work_id, int $financial_id)
    {
        $financial = Financial::find($financial_id);
        $disabled = true;
        $type = $this->privilege($work_id);
        return view('works.financial.show', compact('financial','type','work_id', 'disabled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $work_id
     * @param  int $financial_id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $work_id, int $financial_id)
    {
        $financial = Financial::find($financial_id);
        return view('works.financial.edit', compact('financial', 'work_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $work_id
     * @param  int $financial_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $work_id, int $financial_id)
    {
        $data = $this->replace($request->all());
        Financial::find($financial_id)->fill($data)->save();
        return redirect('works')->with('status', Message::success("Atualização", "resumo financeiro", 'f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $financial_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $work_id, int $financial_id)
    {
        Financial::find($financial_id)->delete();
        return redirect('works')->with('status', Message::success("Remoção", "resumo financeiro",'f'));
    }
}
