<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirects()
    {
        $userType = auth()->user()->usertype;
        if ($userType === '1') {
            return view('admin.index');
        } else {
            return view('home');
        }
    }
}
