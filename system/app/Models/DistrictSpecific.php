<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 地区特有の情報モデル
 */
class DistrictSpecific extends Model
{
    protected $fillable = ['type', 'title', 'file1', 'detail1', 'file2', 'detail2', 'file3', 'detail3', 'latitude', 'longitude', 'area_list_id'];

    /**
     * 地区特有の情報を取得
     *
     * 地区マスタを外部結合
     *
     * @param [int] $areaListId 地区ID
     * @return void
     */
    public static function findAreaListId($areaListId)
    {
        $query = Supplies::from('district_specifics as d')
            ->select('d.id as id', 'd.title as title', 'a.name as type')
            ->where('d.area_list_id', '=', $areaListId)
            ->leftJoin('area_masters as a', 'd.type', '=', 'a.id');
        return $query->get();
    }
}
