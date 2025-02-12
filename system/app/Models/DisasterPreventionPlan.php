<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地区防災計画モデル
 */
class DisasterPreventionPlan extends Model
{
    protected $fillable = ['filename', 'area_list_id'];
}
