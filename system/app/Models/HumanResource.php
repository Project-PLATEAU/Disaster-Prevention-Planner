<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 人的資源モデル
 */
class HumanResource extends Model
{
    protected $fillable = ['name', 'phone', 'recital', 'skill1', 'skill2', 'skill3', 'skill4', 'area_list_id'];
}
