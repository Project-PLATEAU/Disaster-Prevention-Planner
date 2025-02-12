<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 非常持出アイテムマスタモデル
 */
class CarryItemMaster extends Model
{
    protected $fillable = ['name', 'view', 'carry_type_master_id'];
}
