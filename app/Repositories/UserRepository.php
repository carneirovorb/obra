<?php

namespace App\Repositories;

use App\User;
use App\Work;
use App\Permission;
use Auth;

/**
 * User repository implementation  
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
class UserRepository implements Repository
{
    const ownerPrivilege = 2;

    const noPermission   = 0;
    /**
     * Store a newly user and create permission in works.
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['cpf']);
        $user = User::create($data);
        $works = Work::all();
        foreach ($works as $work) {
            Permission::create(['work_id'=>$work->id, 'user_id'=>$user->id, 'type'=>self::noPermission]);
        }
    }

    /**
     * Find by user.
     *
     * @param  int  $id
     * @return User
     */
    public function read(int $id)
    {
        return User::find($id);
    }

    /**
     * Update user.
     *
     * @param  int  $id
     * @param  array  $data
     */
    public function update(int $id, array $data)
    {
        $this->read($id)->fill($data)->save();
    }

    /**
     * Delete user.
     *
     * @param  int  $id
     */
    public function delete(int $id)
    {
        $this->read($id)->delete();
    }

    /**
     * Return all users.
     *
     * @return Collection
     */
    public function all()
    {
        return User::where('id','<>', Auth::user()->id)->where('privilege','<', self::ownerPrivilege)->get();
    }

    /**
     * Find by user with criteria.
     *
     * @param  string  $column
     * @param  $value
     * @return Collection
     */
    public function find(string $column = 'id', $value)
    {
        return User::where($column, $value)->get();
    }
}
