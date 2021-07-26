<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Coin extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['updated_at', 'name'];

    protected $fillable = [
        'user_id',
        'icon',
        'name',
        'number'
    ];
}
