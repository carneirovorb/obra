<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WorkRepository;
use App\Traits\CheckPrivilege;
use App\Utils\Message;

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
class WorkController extends Controller
{
    use CheckPrivilege;

    /**
    * Repository instance 
    *
    * @var WorkRepository 
    */
    private $repository;
  
    /**
     * $repository init.
     */
    public function __construct()
    {
        $this->repository = new WorkRepository;
    }

    /**
     * Replace money mask.
     *
     * @param  array  $data
     * @return array  $data
     */
    private function replace(array $data) : array
    {
        if ($data['value']) {
            $value = explode(",", $data['value']);
            $value[0] = str_replace( ".", "", $value[0]);
            $data['value'] = $value[0]. '.'.$value[1];    
        }
        
        if ($data['value_free']) {
            $value_free = explode(",", $data['value_free']);
            $value_free[0] = str_replace( ".", "", $value_free[0]);
            $data['value_free'] = $value_free[0].'.'.$value_free[1];    
        }
        
        if ($data['spreadsheet_winner']) {
            $spreadsheet_winner = explode(",", $data['spreadsheet_winner']);
            $spreadsheet_winner[0] = str_replace( ".", "", $spreadsheet_winner[0]);
            $data['spreadsheet_winner'] = $spreadsheet_winner[0].'.'.$spreadsheet_winner[1];    
        }
        
        if ($data['repass_value']) {
            $repass_value = explode(",", $data['repass_value']);
            $repass_value[0] = str_replace( ".", "", $repass_value[0]);
            $data['repass_value'] = $repass_value[0].'.'.$repass_value[1];    
        }
        
        if ($data['counterpart_value']) {
            $counterpart_value = explode(",", $data['counterpart_value']);
            $counterpart_value[0] = str_replace( ".", "", $counterpart_value[0]);
            $data['counterpart_value'] = $counterpart_value[0].'.'.$counterpart_value[1];    
        }
        
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = $this->repository->all();
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $this->replace($request->all());
        $work = $this->repository->create($data);
        return redirect('works')->with('status', Message::success("Cadastro", "obra"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $work_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $work_id)
    {
        $disabled =  true;
        $work =  $this->repository->read($work_id);
        $type = $this->privilege($work_id); 
        return view('works.show', compact('work','type', 'work_id', 'disabled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $work_id 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $work_id)
    {
        $work = $this->repository->read($work_id);
        return view('works.edit', compact('work', 'work_id'));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int $work_id 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $work_id, Request $request)
    {
        $data = $this->replace($request->all());
        $this->repository->update($work_id, $data);
        return redirect('works')->with('status', Message::success("Atualização", "obra", 'f'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $work_id 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $work_id)
    {
        $this->repository->delete($work_id);
        return redirect('works')->with('status', Message::success("Remoção", "obra", 'f'));
    }

    /**
     * Search the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByName(Request $request)
    {
        $works = $this->repository->findByName($request->all());
        return view('works.index', compact('works'));
    }

    /**
     * Search the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByFolder(Request $request)
    {
        $works = $this->repository->findByFolder($request->all());
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for permissions editing the specified resource.
     *
     * @param  int $work_id 
     * @return \Illuminate\Http\Response
     */
    public function editPermissions(int $work_id)
    {
        $permissions = $this->repository->editPermissions($work_id);
        return view('works.permissions',['permissions'=>$permissions, 'work_id'=>$work_id]);
    }

    /**
     * Update perminssions for specified resource from storage.
     *
     * @param  int $work_id 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePermissions(int $work_id, Request $request)
    {
        $this->repository->updatePermissions($work_id, $request->all());
        return redirect('works')->with('status', Message::success("Atualização", "permissões de usuário", 'f'));
    }
}
