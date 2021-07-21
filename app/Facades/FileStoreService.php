<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileStoreService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'FileStoreService';
    }
}