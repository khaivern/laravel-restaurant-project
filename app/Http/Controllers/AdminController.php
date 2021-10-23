<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function users()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    public function destroyUser(User $user)
    {

        $user->delete();
        session()->flash('deleted-message', 'The user ' . $user->name . ' has been deleted');
        return back();
    }

    public function foodMenu()
    {
        return view('admin.foodmenu.index', ['menus' => FoodMenu::all()]);
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

        FoodMenu::created($inputs);
        session()->flash('success-message', 'Menu : ' . request('title') . ' has been added');
        return back();
    }

    public function foodMenuDestroy($foodId)
    {
        $foodMenu = FoodMenu::findOrFail($foodId);
        $foodMenu->delete();

        session()->flash('deleted-foodmenu-success', 'The food - ' . $foodMenu->title  . ' has been deleted');
        return back();
    }

    public function foodMenuEdit($foodId)
    {
        $foodMenu = FoodMenu::findOrFail($foodId);
        return view('admin.foodmenu.edit', ['menu' => $foodMenu]);
    }

    public function foodMenuUpdate($foodId)
    {
        $foodMenu = FoodMenu::find($foodId);
        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('images');
            $foodMenu->image = $inputs['image'];
        }

        $foodMenu->title = $inputs['title'];
        $foodMenu->description = $inputs['description'];
        $foodMenu->price = $inputs['price'];
        if ($foodMenu->isDirty()) {
            $foodMenu->save();
            session()->flash('updated-message', 'Food Menu Updated');
        } else {
            session()->flash('not-updated-message', 'Food Menu Unchanged');
        }
        return back();
    }

    public function reservations()
    {
        return view('admin.reservations.index', ['reservations' => Reservation::all()]);
    }
}
