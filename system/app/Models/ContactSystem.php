<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 連絡体制モデル
 */
class ContactSystem extends Model
{
    protected $fillable = ['position', 'role', 'name', 'phone', 'area_list_id'];

    /**
     * 連絡体制を取得
     *
     * @param [int] $areaListId 地区ID
     * @return void
     */
    public static function findAreaListId($areaListId)
    {
        $query = ContactSystem::where('contact_systems.area_list_id', '=', $areaListId);
        return $query->get();
    }

    /**
     * 連絡体制を削除
     *
     * @param [int] $areaListId 地区ID
     * @return void
     */
    public static function deleteContact($areaListId)
    {
        ContactSystem::where('contact_systems.area_list_id', '=', $areaListId)->delete();
    }
}
