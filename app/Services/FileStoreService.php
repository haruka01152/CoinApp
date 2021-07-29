<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Coin;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class FileStoreService
{

    public function store(Request $request)
    {
        // アップされた画像をファイルに保存
        $file_name = $request->file('icon')->getClientOriginalName();
        $image_path = $request->file('icon')->storeAs('public/images', time() . $file_name);
        return $image_path;
    }

    public function copyAndRename(Request $request)
    {
        // 画像をコピーして名前を変更（新しく保存）
        $type = Type::where('name', $request->name)->first();
        Storage::copy('public/images/' . $type->icon, 'public/images/Owned' . time() . $type->icon);
        $icon = 'Owned' . time() . $type->icon;
        return $icon;
    }

    public function delete(Request $request, $id)
    {
        // 保有リストの画像をファイルから削除
        $del = Coin::findOrFail($id);
        Storage::delete('public/images/' . $del->icon);
    }

    public function deleteVCImage(Request $request, $id)
    {
        // 仮想通貨の画像をファイルから削除
        $del = Type::findOrFail($id);
        Storage::delete('public/images/' . $del->icon);
    }
}
