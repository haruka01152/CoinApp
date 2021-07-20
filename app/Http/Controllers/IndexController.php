<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use Illuminate\Support\Facades\Storage;

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
                'icon' => time() . basename($image_path),
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

    public function edit(Request $request)
    {
        $coin = Coin::findOrFail($request->id);
        return view('edit', compact('coin'));
    }

    public function update(Request $request)
    {
        $coin = Coin::findOrFail($request->id);
        $rules = [
            'icon' => 'image|max:1024|nullable',
            'name' => 'required|min:1|max:10|unique:coins,name,' . $coin->id,
            'number' => 'required|numeric|min:1',
        ];
        $this->validate($request, $rules);

        if ($request->icon != null) {
            $delIcon = Coin::findOrFail($request->id)->get('icon');
            Storage::delete('public/images/' . $delIcon);
            $image_path = $request->file('icon')->store('public/images/');

            Coin::where('id', $request->id)->update([
                'icon' => time() . basename($image_path),
                'name' => $request->name,
                'number' => $request->number,
            ]);
        } else {
            Coin::where('id', $request->id)->update([
                'name' => $request->name,
                'number' => $request->number,
            ]);
        }

        return redirect()->action('IndexController@index');
    }
}
