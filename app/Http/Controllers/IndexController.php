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
            'icon' => 'image|max:1024',
            'name' => 'required|min:1|max:10|unique:coins,name',
            'number' => 'required|min:1',
        ];
        $this->validate($request, $rules);

        if ($request->hasFile('icon') && $request->icon->isValid()) {
            $file = time() . $request->icon->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $file);

            Coin::create([
                'icon' => $file,
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
