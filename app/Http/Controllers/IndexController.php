<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;

class IndexController extends Controller
{
    //
    public function index()
    {
        $coins = Coin::all();
        return view('index', compact('coins'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $rules = [
            'icon' => 'image|max:1024|nullable',
            'name' => 'required|min:1|max:10|unique:coins,name',
            'number' => 'required|numeric|min:1',
        ];
        $this->validate($request, $rules);

        if ($request->icon != null) {
            $image_path = $request->file('icon')->store('public/images/');

            Coin::create([
                'icon' => basename($image_path),
                'name' => $request->name,
                'number' => $request->number,
            ]);
        } else {
            Coin::create([
                'name' => $request->name,
                'number' => $request->number,
            ]);
        }

        return redirect()->action('IndexController@index');
    }
}
