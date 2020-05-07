<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        $name = $request->get('name', null);
        $email = $request->get('email', null);
        $sort = $request->get('sort', "id-asc");
        $pageUnit = $request->get('page_unit', 10);

        switch ($sort) {
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
        }

        if ($name != null) {
            $query->where('name','like',"%$name%");
        }
        if ($email != null) {
            $query->where('email','like',"%$email");
        }

        if ($pageUnit != null) {
            $users = $query->paginate($pageUnit);
        }
        return view('admin.users.index',
            compact('users', 'name', 'email', 'sort', 'pageUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ];

        $message = [
            'name.required' => 'nameは、必ず指定してください。',
            'email.required' => 'emailは、必ず指定してください。',
            'email.email' => 'emailは、有効なメールアドレス形式で指定してください。',
            'password.required' => 'passwordは、必ず指定してください。',
            'password_confirmation.same' => 'passwordとpassword確認が一致しません。',
        ];

        $validation = \Validator::make($inputs, $rules, $message);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $pass_path1 = $request->file('image_path')->store('public\photo');
        $pass_path2 = str_replace('public\\', '', $pass_path1);
        $user->image_path = $pass_path2;
        $user->save();

        return redirect("http://localhost/admin/users/$user->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputs = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ];

        $message = [
            'name.required' => 'nameは、必ず指定してください。',
            'email.required' => 'emailは、必ず指定してください。',
            'email.email' => 'emailは、有効なメールアドレス形式で指定してください。',
            'password.required' => 'passwordは、必ず指定してください。',
            'password_confirmation.same' => 'passwordとpassword確認が一致しません。',
        ];

        $validation = \Validator::make($inputs, $rules, $message);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        if ($request->delete_image == "1") {
            $user->image_path = null;
        } elseif ($request->image_path != null) {
            $pass_path1 = $request->file('image_path')->store('public\photo');
            $pass_path2 = str_replace('public\\', '', $pass_path1);
            $user->image_path = $pass_path2;
        }
        $user->update($request->all());
            return redirect("http://localhost/admin/users/$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect("http://localhost/admin/users");
    }
}
