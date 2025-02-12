<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地区特性モデル
 */
class AreaCharacteristic extends Model
{
    protected $fillable = ['title', 'detail', 'filename', 'area_list_id'];
}
