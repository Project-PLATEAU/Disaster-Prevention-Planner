<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 避難のタイミングモデル
 */
class EvacuationTiming extends Model
{
    protected $fillable = ['timing1', 'timing1_other', 'timing2', 'timing2_other', 'timing3', 'timing3_other', 'timing4', 'timing4_other', 'timing5', 'timing5_other', 'timing6', 'timing6_other', 'timing7', 'timing7_other', 'user_id'];
}
