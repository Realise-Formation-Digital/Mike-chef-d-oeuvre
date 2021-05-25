<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGearRequest;
use App\Models\Gear;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GearController extends Controller
{
    public function test()
    {
        $user = User::find(Auth::id());

        dd($user->gear);
    }

    public function index()
    {
        $gears = Gear::where('user_id', Auth::id())->get();

        return view('gear.index', ['gears' => $gears]);
    }

    public function create()
    {
        return view('gear.create');
    }

    public function update($id)
    {
        $gear = Gear::find($id);

        if ($gear->user_id !== Auth::id()) {
            abort(403);
        }

        return view('gear.create', ['gear' => $gear]);
    }

    public function store(StoreGearRequest $request)
    {
        Gear::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('gear.index');
    }

    public function patch(StoreGearRequest $request, $id)
    {
        $gear = Gear::find($id);

        if ($gear->user_id !== Auth::id()) {
            abort(403);
        }

        $gear->name = $request->name;
        $gear->description = $request->description;

        $gear->save();

        return redirect()->route('gear.index');
    }
}
