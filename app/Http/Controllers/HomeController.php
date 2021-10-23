<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\FoodMenu;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home', [
            'menus' => FoodMenu::all(),
            'chefs' => Chef::all(),
            'count' => (auth()->user()) ?
                auth()->user()->menus()->count()
                : null
        ]);
    }

    public function redirects()
    {
        $user = auth()->user();
        if ($user->usertype === '1') {
            return view('admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function reservationStore()
    {
        $inputs = request()->validate([
            'name' => ['required'],
            'email' => 'required',
            'phone' => ['required'],
            'number-of-guest' => ['required'],
            'message' => ['required']
        ]);

        Reservation::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'phone' => $inputs['phone'],
            'number_of_guest' => $inputs['number-of-guest'],
            'date' => request('date'),
            'time' => request('time'),
            'message' => $inputs['message']
        ]);


        session()->flash('reservation-success', 'Your reservation on ' . request('date') . ' is set.');
        return redirect()->route('home', ['#reservation']);
    }

    public function foodMenuStore($foodMenu)
    {

        if (!auth()->user()) {
            return redirect()->route('login');
        } else {
            // If same user_id and food_menu_id, then update instead of save.
            auth()->user()->menus()->save(
                FoodMenu::find($foodMenu),
                ['quantity' => request('quantity')]
            );
        }
        session()->flash('added-to-cart-message', 'Successfully added : ' . FoodMenu::find($foodMenu)->title);
        return redirect()->route('home', ['#menu']);
    }

    public function cart()
    {
        $id = auth()->user()->id;

        // $datas = Cart::where('carts.user_id', $id)->join('food_menus', 'carts.food_menu_id', '=', 'food_menus.id')->get();

        return view('cart', ['count' => User::find($id)->menus()->count(), 'datas' => User::find($id)->menus]);
    }

    public function cartDestroy($data)
    {
        // Cart::where('food_menu_id', $data)->delete();
        $user = auth()->user();
        foreach ($user->menus as $menu) {
            if ($menu->id == $data) {
                $menu->delete();
            }
        }



        // session()->flash('deleted-cart-success', 'Cart item deleted successfully');
        return back();
    }
}
