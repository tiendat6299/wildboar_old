<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('n');

        $users = User::whereRaw(1);

        if ($id) $users->where('id', $id);
        if ($name) $users->where('full_name','like','%'.$name.'%');

        $users = $users->orderByDesc('id')
                        ->paginate(10);
        $viewData = [
            'users' => $users,
            'query' => $request->query()
        ];
        
        return view('admin.user.index', $viewData);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
