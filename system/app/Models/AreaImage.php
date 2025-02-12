<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地域のキャプチャイメージモデル
 */
class AreaImage extends Model
{
    protected $fillable = ['name', 'image01', 'image02', 'image03', 'image04', 'image05', 'image06', 'image07', 'area_list_id'];
}
