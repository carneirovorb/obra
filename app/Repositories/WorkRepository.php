<?php

namespace App\Repositories;

use Auth;
use App\Permission;
use App\Work;
use App\User;
use App\Prefecture;

/**
 * Work repository implementation  
 *
 * Business logic.
 *
 * @package    amado-eng
 * @subpackage App\Repositories
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class WorkRepository implements Repository
{
    const ownerPrivilege = 2;
    const adminPrivilege = 1;

    const permissionEdit = 2;
    const permissionSee  = 1;
    const noPermission   = 0;
    /**
     * Store a newly work and create users permissions.
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        if (isset($data['prefectureNew'])) {
            $prefecture = Prefecture::create(['name'=>$data['prefectureNew']]);
            $data['prefecture_id'] =  $prefecture->id;
        }

        $work = Work::create($data);
        $users = User::where('id','<>', Auth::user()->id)->where('privilege','<>', self::ownerPrivilege)->get();
        foreach ($users as $user) {
            Permission::create(['work_id'=>$work->id, 'user_id'=>$user->id, 'type'=> self::noPermission]);
        }
        if (Auth::user()->privilege != self::ownerPrivilege)
            Permission::create(['work_id'=>$work->id, 'user_id'=>Auth::user()->id, 'type'=>self::permissionEdit]);
        return $work;
    }

    /**
     * Find by work.
     *
     * @param  int  $id
     * @return Work
     */
    public function read(int $id)
    {
        return Work::find($id);
    }
    
    /**
     * Update work.
     *
     * @param  int  $id
     * @param  array  $data
     */
    public function update(int $id, array $data)
    {
       $this->read($id)->fill($data)->save();
    }

    /**
     * Delete work.
     *
     * @param  int  $id
     */
    public function delete(int $id)
    {
        $this->read($id)->delete();
    }

    /**
     * Return all works.
     *
     * @return Collection $works
     */
    public function all()
    {
        if (Auth::user()->privilege == self::ownerPrivilege) {
             return Work::all(['id', 'name', 'contract','year','status']);
        }
        $works = Auth::user()->works()->where('type','>=', self::permissionSee)->get(['works.id', 'works.name', 'contract','year','status']);
        return $works;
    }

    /**
     * Search by work.
     *
     * @param  array  $data
     * @return Collection $works
     */
    public function findByFolder(array $data)
    {
        if (Auth::user()->privilege == self::ownerPrivilege) {
            if ($data['bond'] != null && $data['type_work'] != null) {
                $works = Work::where('prefecture_id', $data['prefecture_id'])->where('bond', $data['bond'])->where('type_work', $data['type_work'])->get(['works.id', 'works.name', 'contract','year','status']);                
            } elseif ($data['bond'] != null && $data['type_work'] == null) {
                $works = Work::where('prefecture_id', $data['prefecture_id'])->where('bond', $data['bond'])->get(['works.id', 'works.name', 'contract','year','status']);
            } elseif ($data['bond'] == null && $data['type_work'] != null) {
                $works = Work::where('prefecture_id', $data['prefecture_id'])->where('type_work', $data['type_work'])->get(['works.id', 'works.name', 'contract','year','status']);
            } else {
                $works = Work::where('prefecture_id', $data['prefecture_id'])->get(['works.id', 'works.name', 'contract','year','status']);
            }
        } else {
            if ($data['bond'] != null && $data['type_work'] != null) {
                $works = Auth::user()->works()->where('type','>=', self::permissionSee)->where('prefecture_id', $data['prefecture_id'])->where('bond', $data['bond'])->where('type_work', $data['type_work'])->get(['works.id', 'works.name', 'contract','year','status']);                
            } elseif ($data['bond'] != null && $data['type_work'] == null) {
                $works = Auth::user()->works()->where('type','>=', self::permissionSee)->where('prefecture_id', $data['prefecture_id'])->where('bond', $data['bond'])->get(['works.id', 'works.name', 'contract','year','status']);
            } elseif ($data['bond'] == null && $data['type_work'] != null) {
                $works = Auth::user()->works()->where('type','>=', self::permissionSee)->where('prefecture_id', $data['prefecture_id'])->where('type_work', $data['type_work'])->get(['works.id', 'works.name', 'contract','year','status']);
            } else {
                $works = Auth::user()->works()->where('type','>=', self::permissionSee)->where('prefecture_id', $data['prefecture_id'])->get(['works.id', 'works.name', 'contract','year','status']);
            }
        }
        return $works;
    }

    /**
     * Search work by name.
     *
     * @param  array  $data
     * @return Collection $works
     */
    public function findByName(array $data)
    {
        if (Auth::user()->privilege == self::ownerPrivilege) {
            $works = Work::where('name', 'ilike', '%'.$data['search'].'%')->get(['works.id', 'works.name', 'contract','year','status']);
        } else {
            $works = Auth::user()->works()->where('type','>=', self::permissionSee)->where('name', 'ilike', '%'.$data['search'].'%')->get(['works.id', 'works.name', 'contract','year','status']);
        }
        return $works;
    }
    /**
     * Return all permissions to work.
     *
     * @param  int  $id
     * @return Collection $permissions
     */
    public function editPermissions(int $id)
    {
        $permissions = Permission::where('work_id', $id)->where('user_id','<>', Auth::user()->id)->get();
        return $permissions;
    }

    /**
     * Upgrade all users permissions to work.
     *
     * @param  int   $work_id
     * @param  array $users_permissions
     */
    public function updatePermissions(int $work_id, array $users_permissions)
    {
        $permissions = Permission::where('work_id', $work_id)->where('user_id','<>', Auth::user()->id)->get();
        foreach ($permissions as $permission) {
            $permission->delete();
        }

        foreach ($users_permissions as $user_permission) {
            $conf = explode(';', $user_permission);
            if (is_numeric($conf[0])) {
                Permission::create(['work_id'=>$work_id, 'user_id'=>$conf[0], 'type'=>$conf[1]]);
            }
        }
    }
}
