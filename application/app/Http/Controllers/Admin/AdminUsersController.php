<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminUser;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = AdminUser::query();
        $name = $request->get('name', null);
        $email = $request->get('email', null);
        $authority = $request->get('authority', 'all');
        $sort = $request->get('sort', 10);
        $pageUnit = $request->get('page_unit', 10);

        switch ($sort){
            case 'id-asc':
                $query = $query->orderBy('id', 'ASC');
                break;
            case 'id-desc':
                $query = $query->orderBy('id', 'DESC');
                break;
            case 'name-asc':
                $query = $query->orderBy('name', 'ASC');
                break;
            case 'name-desc':
                $query = $query->orderBy('name', 'DESC');
                break;
            case 'email-asc':
                $query = $query->orderBy('email', 'ASC');
                break;
            case 'email-desc':
                $query = $query->orderBy('email', 'DESC');
                break;
            case 'owner-no':
                $query = $query->orderBy('is_owner', 'ASC');
                break;
            case 'owner-yes':
                $query = $query->orderBy('is_owner', 'DESC');
                break;
        }

        if($name != null){
            $query->where('name','like','%'.$name.'%');
        }
        if($email != null) {
            $query->where('email','like','%'.$email.'%');
        }

        switch ($authority){
            case 'all':
                $query->get();
                break;
            case 'owner':
                $query->where('is_owner','like','1');
                break;
            case 'general':
                $query->where('is_owner','like','0');
                break;
        }

        if($pageUnit != null) {
            $AdminUsers = $query->paginate($pageUnit);
        }

        return view('admin.admin_users.index',
            compact('AdminUsers', 'name', 'email', 'authority', 'sort', 'pageUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {
        return view('admin.admin_users.show', ['adminUser' => $adminUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser)
    {
        return view('admin.admin_users.edit', ['adminUser' => $adminUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
