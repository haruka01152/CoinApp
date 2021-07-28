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

        return redirect()->action('IndexController@index');
    }

    public function editVC(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        return view('editVC', compact('type'));
    }

}
