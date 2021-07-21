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
        $coins = Coin::paginate(3);
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
            $file_name = $request->file('icon')->getClientOriginalName();
            $image_path = $request->file('icon')->storeAs('public/images', time().$file_name);

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
            // 前の画像をファイルから削除
            $del = Coin::findOrFail($request->id);
            Storage::delete('public/images/' . $del->icon);

            // 新しくアップされた画像をファイルに保存
            $file_name = $request->file('icon')->getClientOriginalName();
            $image_path = $request->file('icon')->storeAs('public/images', time().$file_name);

            // DB更新
            Coin::where('id', $request->id)->update([
                'icon' => basename($image_path),
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
