<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 家族情報モデル
 */
class FamilyData extends Model
{
    protected $fillable = ['name', 'attr1', 'attr2', 'attr3', 'others', 'user_id'];

    /**
     * 家族情報を削除
     *
     * @param [int] $userId ユーザID
     * @return void
     */
    public static function deleteFamilyData($userId)
    {
        FamilyData::where('family_data.user_id', '=', $userId)->delete();
    }
}
