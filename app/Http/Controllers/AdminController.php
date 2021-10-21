<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function users()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    public function destroy(User $user)
    {

        session()->flash('deleted-message', 'The user ' . $user->name . ' has been deleted');
        $user->delete();
        return back();
    }

    public function foodMenu()
    {
        return view('admin.foodmenu.index');
    }

    public function foodMenuStore()
    {
        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'file'
        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('images');
        }

        auth()->user()->menus()->create($inputs);
        session()->flash('success-message', 'Menu : ' . request('title') . ' has been added');
        return back();
    }
}
