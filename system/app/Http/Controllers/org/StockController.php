<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;
use App\Models\Supplies;
use App\Models\MaterialTypeMaster;
use App\Models\MaterialItemMaster;

/**
 * 物資・資材の備蓄
 */
class StockController extends Controller
{
    /**
     * 倉庫リスト トップページ
     *
     * @return void
     */
    public function warehouse()
    {
        $data = Warehouse::all();
        return view('org.stock.warehouse', ['data' => $data]);
    }

    /**
     * 倉庫リスト 入力ページ
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の org_url にて設定
     *
     * @return void
     */
    public function stock()
    {
        $data = null;
        $mode = 'create';
        if (request()->has('id')) {
            $data = Warehouse::find(request('id'));
            $mode = 'update';
        }
        return view('org.stock.stock', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.org_url')]);
    }

    /**
     * 倉庫リスト 登録
     *
     * @return void
     */
    public function exec()
    {
        $mode = request('mode');
        if ($mode == 'create') {
            Warehouse::create([
                'name'          => request('name'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $warehouse = Warehouse::find(request('id'));
            $warehouse::update([
                'name'          => request('name'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
            ]);
            $message = 'データの更新が完了しました';
        }

        // 倉庫リストトップページに移動
        return redirect('/org/stock/warehouse')->with('message', $message);
    }

    /**
     * 物資リスト トップページ
     *
     * @return void
     */
    public function supply()
    {
        $data = Supplies::findAll();

        return view('org.stock.supply', ['data' => $data]);
    }

    /**
     * 物資リスト 入力ページ
     *
     * @return void
     */
    public function item()
    {
        $data = null;
        $mode = 'create';
        if (request()->has('id')) {
            $data = Supplies::findItem(request('id'));
            $mode = 'update';
        }
        $typeList = MaterialTypeMaster::all();
        $itemList = MaterialItemMaster::all();
        $warehous = Warehouse::all();
        return view('org.stock.item', ['mode' => $mode, 'data' => $data, 'typeList' => $typeList, 'itemList' => $itemList, 'warehouse' => $warehous, 'typeId' => '']);
    }

    /**
     * 物資リスト 登録
     *
     * @return void
     */
    public function exec2()
    {
        $mode = request('mode');
        if ($mode == 'create') {
            Supplies::create([
                'amount'                    => request('amount'),
                'area_list_id'              => Auth::guard()->user()->area_list_id,
                'warehouse_id'              => request('warehouse'),
                'material_item_master_id'   => request('item_master')
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $supplies = Supplies::find(request('id'));
            $supplies::update([
                'amount'                    => request('amount'),
                'warehouse_id'              => request('warehouse'),
                'material_item_master_id'   => request('item_master')
            ]);
            $message = 'データの更新が完了しました';
        }

        // 物資リストトップページに移動
        return redirect('/org/stock/supply')->with('message', $message);
    }

    /**
     * 倉庫リスト 削除
     *
     * @return void
     */
    public function delete()
    {
        $warehouse = Warehouse::find(request('id'));
        $warehouse->update([
            'view'  => 0
        ]);
    }

    /**
     * 物資リスト 削除
     *
     * @return void
     */
    public function delete2()
    {
        Supplies::where('id', request('id'))->delete();
        return response()->json([
            'result'    => 1
        ]);
    }
}
