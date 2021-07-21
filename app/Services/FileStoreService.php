<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Coin;
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

    public function delete(Request $request)
    {
        // 画像をファイルから削除
        $del = Coin::findOrFail($request->id);
        Storage::delete('public/images/' . $del->icon);
    }
}
