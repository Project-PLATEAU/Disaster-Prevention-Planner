<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 物資アイテムマスタモデル
 */
class MaterialItemMaster extends Model
{
    protected $fillable = ['name', 'view', 'material_type_master_id'];
}
