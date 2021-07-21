<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use FileStoreService;

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

    public function create(CreateRequest $request)
    {
        if ($request->icon != null) {
            $image_path = FileStoreService::index($request);

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

    public function update(UpdateRequest $request)
    {
        if ($request->icon != null) {
            // 前の画像をファイルから削除
            $del = Coin::findOrFail($request->id);
            Storage::delete('public/images/' . $del->icon);

            // 新しくアップされた画像をファイルに保存
            $image_path = FileStoreService::index($request);

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
