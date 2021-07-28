<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FileStoreService;
use App\Models\User;
use App\Models\Coin;
use App\Models\Type;
use App\Http\Requests\CreateVCRequest;
use Illuminate\Support\Facades\Auth;

class VCController extends Controller
{
    //

    public function VC()
    {
        $types = Type::where('user_id', Auth::id())->sortable()->paginate(10);
        return view('VC', compact('types'));
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
                'user_id' => Auth::id(),
            ]);
        } else {
            Type::create([
                'name' => $request->name,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->action('VCController@VC');
    }

    public function editVC(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        return view('editVC', compact('type'));
    }

    public function updateVC(Request $request, $id)
    {
        if ($request->icon != null) {

            if($request->deleteIcon){
                return redirect('editVC/' . $id)->withErrors('アイコンの更新と削除を両方選択することはできません。')->withInput();
            }

            // 前の画像をファイルから削除
            FileStoreService::deleteVCImage($request, $id);

            // 新しくアップされた画像をファイルに保存
            $image_path = FileStoreService::store($request);

            // DB更新
            Type::where('id', $id)->update([
                'icon' => basename($image_path),
                'name' => $request->name,
            ]);
        } else {

            // 「アイコンを削除する」が押されていたら
            if ($request->deleteIcon) {

                // 画像をファイルから削除
                FileStoreService::deleteVCImage($request, $id);

                // DBのアイコンカラムをnullに更新
                Type::where('id', $id)->update([
                    'icon' => null,
                ]);
            }
            Type::where('id', $id)->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->action('VCController@VC');
    }

    public function deleteVC(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        return view('deleteVC', compact('type'));
    }

    public function destroyVC(Request $request, $id)
    {
        Type::where('id', $id)->delete();
        return redirect()->action('VCController@VC');
    }

}
