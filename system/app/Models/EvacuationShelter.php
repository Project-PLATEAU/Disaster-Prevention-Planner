<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地区一次避難場所モデル
 */
class EvacuationShelter extends Model
{
    protected $fillable = ['type', 'disaster_type', 'name', 'recital', 'bldg_id', 'latitude', 'longitude', 'area_list_id'];
}
