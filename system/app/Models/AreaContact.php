<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 緊急連絡先モデル
 */
class AreaContact extends Model
{
    protected $fillable = ['name', 'phone', 'bldg_id', 'latitude', 'longitude', 'area_list_id'];
}
