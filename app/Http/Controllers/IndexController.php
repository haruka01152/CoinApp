<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\CreateVCRequest;
use App\Http\Requests\UpdateRequest;
use FileStoreService;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $coins = Coin::where('user_id', Auth::id())->sortable()->paginate(10);
        return view('index', compact('coins', 'user'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(CreateRequest $request)
    {
        if ($request->icon != null) {
            // アップされた画像をファイルに保存
            $image_path = FileStoreService::store($request);

            Coin::create([
                'user_id' => Auth::id(),
                'icon' => basename($image_path),
                'name' => $request->name,
                'number' => $request->number,
            ]);
        } else {
            Coin::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'number' => $request->number,
            ]);
        }

        return redirect()->action('IndexController@index');
    }

    public function addVC()
    {
        return view('addVC');
    }

    public function createVC(CreateVCRequest $request)
    {
        if ($request->icon != null) {
            // アップされた画像をファイルに保存
            $image_path = FileStoreService::store($request);

            Type::create([
                'icon' => basename($image_path),
                'name' => $request->name,
            ]);
        } else {
            Type::create([
                'name' => $request->name,
            ]);
        }

        return redirect()->action('IndexController@index');
    }

    public function edit(Request $request, $id)
    {
        $coin = Coin::findOrFail($id);
        return view('edit', compact('coin'));
    }

    public function update(UpdateRequest $request, $id)
    {
        if ($request->icon != null) {

            if($request->deleteIcon){
                return redirect('edit/' . $id)->withErrors('アイコンの更新と削除を両方選択することはできません。')->withInput();
            }

            // 前の画像をファイルから削除
            FileStoreService::delete($request);

            // 新しくアップされた画像をファイルに保存
            $image_path = FileStoreService::store($request);

            // DB更新
            Coin::where('id', $id)->update([
                'icon' => basename($image_path),
                'name' => $request->name,
                'number' => $request->number,
            ]);
        } else {

            // 「アイコンを削除する」が押されていたら
            if ($request->deleteIcon) {

                // 画像をファイルから削除
                FileStoreService::delete($request);

                // DBのアイコンカラムをnullに更新
                Coin::where('id', $id)->update([
                    'icon' => null,
                ]);
            }
            Coin::where('id', $id)->update([
                'name' => $request->name,
                'number' => $request->number,
            ]);
        }

        return redirect()->action('IndexController@index');
    }

    public function delete(Request $request, $id)
    {
        $coin = Coin::findOrFail($id);
        return view('delete', compact('coin'));
    }

    public function destroy(Request $request, $id)
    {
        Coin::where('id', $id)->delete();
        return redirect()->action('IndexController@index');
    }
}
