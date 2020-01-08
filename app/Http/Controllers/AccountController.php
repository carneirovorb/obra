<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Work;
use App\Traits\CheckPrivilege;
use App\Utils\Message;

/**
 * Controller for Account resource  
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
class AccountController extends Controller
{
    use CheckPrivilege;
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $work_id)
    {
        return view('works.accounts.create', compact('work_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $work_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $work_id)
    {
        $account = Work::find($work_id)->account()->first();
        $disabled = true;
        $type = $this->privilege($work_id);       
        return view('works.accounts.show', compact('account','type','work_id', 'disabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account;
        $account->fill($request->all())->save();
        return redirect('works')->with('status', Message::success("Cadastro", "conta bancária"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $work_id
     * @param  int $account_id 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $work_id, int $account_id)
    {
        $account = Account::find($account_id);
        return view('works.accounts.edit', compact('account', 'work_id'));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $account_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $work_id, int $account_id, Request $request)
    {
        Account::find($account_id)->fill($request->all())->save();
        return redirect('works')->with('status', Message::success("Atualização", "conta bancária", 'f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $work_id 
     * @param  int $account_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $work_id, int $account_id)
    {
        Account::find($account_id)->delete();
        return redirect('works')->with('status', Message::success("Remoção", "conta bancária", 'f'));
    }
}
