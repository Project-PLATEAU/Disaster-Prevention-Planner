<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * リスク情報モデル
 */
class DisasterRisk extends Model
{
    protected $fillable = ['title', 'time', 'type', 'file1', 'detail1', 'file2', 'detail2', 'file3', 'detail3', 'latitude', 'longitude', 'user_id', 'area_list_id'];
}
