<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 備蓄情報モデル
 */
class Supplies extends Model
{
    protected $table = 'supplies';
    protected $fillable = ['amount', 'area_list_id', 'warehouse_id', 'material_item_master_id'];

    /**
     * 物資情報を取得
     *
     * 倉庫、物資タイプマスタ、物資アイテムマスタを外部結合
     *
     * @param [id] $id 倉庫ID
     * @return void
     */
    public static function findItem($id)
    {
        $query = Supplies::from('supplies as s')
            ->select('s.id as id', 's.amount as s_amount', 'm1.id as m1_id', 'w.id as w_id', 'm2.id as m2_id')
            ->where('s.id', '=', $id)
            ->leftJoin('material_item_masters as m1', 's.material_item_master_id', '=', 'm1.id')
            ->leftJoin('warehouses as w', 's.warehouse_id', '=', 'w.id')
            ->leftJoin('material_type_masters as m2', 'm1.material_type_master_id', '=', 'm2.id');
        return $query->first();
    }

    /**
     * 物資情報を取得
     *
     * 倉庫、物資タイプマスタ、物資アイテムマスタを外部結合
     *
     * @return void
     */
    public static function findAll() {
        $query = Supplies::from('supplies as s')
            ->select('s.id as id', 's.amount as s_amount', 'm1.name as m1_name', 'w.name as w_name', 'm2.name as m2_name')
            ->leftJoin('material_item_masters as m1', 's.material_item_master_id', '=', 'm1.id')
            ->leftJoin('warehouses as w', 's.warehouse_id', '=', 'w.id')
            ->leftJoin('material_type_masters as m2', 'm1.material_type_master_id', '=', 'm2.id');
        return $query->get();
    }
}
