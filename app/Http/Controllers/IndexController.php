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
        $coins = Coin::where('user_id', Auth::id())->sortable()->paginate(10);
        return view('index', compact('coins'));
    }

    public function add()
    {
        $types = Type::where('user_id', Auth::id())->get();
        return view('add', compact('types'));
    }

    public function create(CreateRequest $request)
    {
        // 名前のバリデーション
        if ($request->name) {

            if ($request->nameinput) {
                return redirect('add')->withErrors('名前の入力は、リストからの選択か自由入力どちらかにしてください。')->withInput();
            }

            $name = $request->name;
        } else {

            if (!$request->nameinput) {
                return redirect('add')->withErrors('名前は、必ず指定してください。')->withInput();
            }

            $name = $request->nameinput;
        }


        if ($request->icon != null) {
            // アップされた画像をファイルに保存
            $image_path = FileStoreService::store($request);

            Coin::create([
                'user_id' => Auth::id(),
                'icon' => basename($image_path),
                'name' => $name,
                'number' => $request->number,
            ]);
        } else {
            // アイコンがアップされていない　かつ　名前をリストから選択
            if ($request->name) {
                $type = Type::where('name', $request->name)->first();
                Coin::create([
                    'user_id' => Auth::id(),
                    'icon' => $type->icon,
                    'name' => $name,
                    'number' => $request->number,
                ]);

            }else{
                // アイコンがアップされていない　かつ　名前を自由入力
                Coin::create([
                    'user_id' => Auth::id(),
                    'name' => $name,
                    'number' => $request->number,
                ]);
    
            }
        }

        return redirect()->action('IndexController@index');
    }

    public function edit(Request $request, $id)
    {
        $types = Type::all();
        $coin = Coin::findOrFail($id);
        return view('edit', compact('coin', 'types'));
    }

    public function update(UpdateRequest $request, $id)
    {
        if ($request->icon != null) {

            if ($request->deleteIcon) {
                return redirect('edit/' . $id)->withErrors('アイコンの更新と削除を両方選択することはできません。')->withInput();
            }

            // 前の画像をファイルから削除
            FileStoreService::delete($request, $id);

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
                FileStoreService::delete($request, $id);

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
        FileStoreService::delete($request, $id);
        Coin::where('id', $id)->delete();
        return redirect()->action('IndexController@index');
    }
}
