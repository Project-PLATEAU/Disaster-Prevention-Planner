<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 倉庫モデル
 */
class Warehouse extends Model
{
    protected $fillable = ['name', 'bldg_id', 'latitude', 'longitude', 'view', 'area_list_id'];
}
