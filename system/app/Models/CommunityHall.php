<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 自治会館モデル
 */
class CommunityHall extends Model
{
    protected $fillable = ['name', 'detail', 'bldg_id', 'latitude', 'longitude', 'area_list_id'];
}
