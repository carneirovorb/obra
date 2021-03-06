<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Work;
use App\Traits\CheckPrivilege;
use App\Utils\Message;

/**
 * Controller for Transfer resource  
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
class TransferController extends Controller
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
        $transfers = Work::find($work_id)->transfers()->get();
        $type = $this->privilege($work_id); 
        return view('works.transfers.index', compact('transfers', 'type', 'work_id'));
    }

    /**
     * Replace money mask.
     *
     * @param  array  $data
     * @return array  $data
     */
    private function replace(array $data) : array
    {
        $data['amount_received'] = str_replace(",", "", $data['amount_received']);
        $data['value_rec'] = str_replace(",", "", $data['value_rec']);
        $data['value_paid'] = str_replace(",", "", $data['value_paid']);
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
        return view('works.transfers.create', compact('work_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->replace($request->all());
        Transfer::create($data);
        return redirect('works')->with('status', Message::success("Cadastro", "dados de transferência"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $work_id
     * @param  int $transfer_id 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $work_id, int $transfer_id)
    {
        $transfer = Transfer::find($transfer_id);
        return view('works.transfers.edit', compact('transfer','work_id'));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $transfer_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $work_id, int $transfer_id, Request $request)
    {
        $data = $this->replace($request->all());
        Transfer::find($transfer_id)->fill($data)->save();
        return redirect('works')->with('status', Message::success("Atualização", "dados de transferência", 'f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $transfer_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $work_id, int $transfer_id)
    {
        Transfer::find($transfer_id)->delete();
        return redirect('works')->with('status', Message::success("Remoção", "dados de transferência",'f'));
    }
}
