<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Utils\Message;
use Auth;

/**
 * Controller for User resource  
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
class UserController extends Controller
{
    /**
    * Repository instance 
    *
    * @var UserRepository 
    */
    private $repository;

    /**
     * $repository init.
     */
    public function __construct()
    {
        $this->repository = new UserRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $work_id 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $user_id)
    {
        $user = $this->repository->read($user_id);
        if ($user_id == Auth::user()->id) {
            return view('users.profile', compact('user'));
        }      
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect('users')->with('status', Message::success("Cadastro", "usuário"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->repository->all();
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $user_id)
    {
        $user = $this->repository->read($user_id);
        return view('users.show', compact('user'));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int $user_id 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $user_id, Request $request)
    {
        if (isset($request->password)) {
            $password = bcrypt($request->password);
            $data = $request->all();
            $data['password'] = $password;
        } else {
            $data = $request->all();
        } 
        $this->repository->update($user_id, $data);
        return redirect('users')->with('status', Message::success("Atualização", "usuário", 'f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user_id 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $user_id)
    {
        $this->repository->delete($user_id);
        return redirect('users')->with('status', Message::success("Remoção", "usuário", 'f'));
    }
}
