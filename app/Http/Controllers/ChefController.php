<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    //
    public function index()
    {
        return view('admin.chefs.index', ['chefs' => Chef::all()]);
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required',
            'specialty' => 'required'
        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('images');
        }

        Chef::create($inputs);
        return back();
    }

    public function destroy(Chef $chef)
    {
        $chef->delete();
        return back();
    }

    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit', ['chef' => $chef]);
    }

    public function update(Chef $chef)
    {
        $inputs = request()->validate([
            'name' => 'required',
            'specialty' => 'required'

        ]);
        if (request('image')) {
            $inputs['image'] = request('image')->store('images');
            $chef->image = $inputs['image'];
        }

        $chef->name = $inputs['name'];
        $chef->specialty = $inputs['specialty'];

        if ($chef->isDirty()) {
            $chef->update();
            session()->flash('chef-update-success', 'Chef Updated');
        } else {
            session()->flash('chef-update-failed', 'Nothing Updated');
        }
        return back();
    }
}
