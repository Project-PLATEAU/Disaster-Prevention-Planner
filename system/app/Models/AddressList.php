<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 住所モデル
 */
class AddressList extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
}
