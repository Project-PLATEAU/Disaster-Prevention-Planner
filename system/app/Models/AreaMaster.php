<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地区特有の情報マスタモデル
 */
class AreaMaster extends Model
{
    protected $fillable = ['name', 'view'];
}
