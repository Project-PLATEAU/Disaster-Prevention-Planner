<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 災害図上訓練コンテンツモデル
 */
class Dig extends Model
{
    protected $fillable = ['num', 'cont', 'area_list_id'];
}
