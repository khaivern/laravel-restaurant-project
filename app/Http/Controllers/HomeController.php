<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['menus' => FoodMenu::all()]);
    }

    public function redirects()
    {
        $userType = auth()->user()->usertype;
        if ($userType === '1') {
            return view('admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => ['required', 'min:5', 'max:15'],
            'email' => 'required',
            'phone' => ['required'],
            'number-of-guest' => ['required'],
            'message' => ['required']
        ]);

        // Reservation::create([
        //     'name' => $inputs['name'],
        //     'email' => $inputs['email'],
        //     'phone' => $inputs['phone'],
        //     'number_of_guest' => $inputs['number-of-guest'],
        //     'date' => request('date'),
        //     'time' => request('time'),
        //     'message' => $inputs['message']
        // ]);



        Reservation::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'number_of_guest' => request('number-of-guest'),
            'date' => request('date'),
            'time' => request('time'),
            'message' => request('message')
        ]);

        session()->flash('reservation-success', 'Your reservation on ' . request('date') . ' is set.');
        return redirect()->route('home', ['#reservation']);
    }
}
