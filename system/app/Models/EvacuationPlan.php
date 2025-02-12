<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 個別避難計画モデル
 */
class EvacuationPlan extends Model
{
    protected $fillable = ['filename', 'user_id'];
}
