<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Type extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = 'name';

    protected $fillable = [
        'icon',
        'name',
        'user_id',
    ];
}
