<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileStoreService
{

    public function index(Request $request)
    {
        $file_name = $request->file('icon')->getClientOriginalName();
        $image_path = $request->file('icon')->storeAs('public/images', time() . $file_name);
        return $image_path;
    }
}
