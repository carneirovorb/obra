<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

/**
 * Permission middleware filter   
 *
 * Business logic.
 *
 * @package    amado-eng
 * @subpackage App\Http\Middleware
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class CheckPermission
{
    const ownerPrivilege = 2;
    const adminPrivilege = 1;

    const permissionEdit = 2;
    const permissionSee  = 1;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->privilege == self::ownerPrivilege) {
            return $next($request);
        } 
        elseif ($request->is('users/*') || $request->is('users')) {
            if (Auth::user()->privilege >= self::adminPrivilege) 
                return $next($request);
            else return redirect('works')->with('status',"Permissão negada!");
        } 
        else {
            if ($request->method() === 'DELETE' || $request->method() === 'PUT') {
                $permission = DB::table('permissions')->where('work_id', $request->route('work_id'))->where('user_id',Auth::user()->id)->where('type', self::permissionEdit)->get();
            }
            if ($request->method() === 'GET' && $request->route('work_id')) {
                $permission = DB::table('permissions')->where('work_id', $request->route('work_id'))->where('user_id',Auth::user()->id)->where('type','>=', self::permissionSee)->get();                
            }
            if ($permission->isNotEmpty())
                return $next($request);
        }
        return redirect('works')->with('status',"Permissão negada!");
    }
}
