<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 避難ルートモデル
 */
class EvacuationRoute extends Model
{
    protected $fillable = ['departure_id', 'departure_lat', 'departure_lng', 'stopover_id', 'stopover_lat', 'stopover_lng', 'destination_id', 'destination_lat', 'destination_lng', 'image', 'user_id'];
}
