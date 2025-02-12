<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CarryItemMaster;
use App\Models\CarryTypeMaster;

/**
 * 非常持出
 */
class CarryController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $user = User::where('id', Auth::guard()->user()->id)->first();

        $takeoutList = explode(',', $user->takeout_list);
        $itemList = array();
        foreach ($takeoutList as $item) {
            $itemList[$item] = 1;
        }

        // 非常持出マスタから全データ取得
        $carryType = CarryTypeMaster::all();
        $carryItem = CarryItemMaster::all();

        // データ変換
        $data = array();
        foreach ($carryType as $item) {
            if (!isset($data[$item->id])) {
                $data[$item->id] = array();
            }
        }
        foreach ($carryItem as $item) {
            $tmp = array(
                'id'    => $item->id,
                'name'  => $item->name,
                'check' => 0
            );
            if (isset($itemList[$item->id])) {
                $tmp['check'] = 1;
            }
            $id = intval($item->carry_type_master_id);
            array_push($data[$id], $tmp);
        }

        return view('resident.carry.index', ['data'=> $data, 'user' => $user]);
    }

    /**
     * 非常持出登録
     *
     * @return void
     */
    public function exec()
    {
        $item = request('item');
        $others = request('others');

        $itemList = '';
        foreach ($item as $id) {
            if ($itemList == '') {
                $itemList .= $id;
            } else {
                $itemList .= ',' . $id;
            }
        }

        $user = User::find(Auth::guard()->user()->id);
        $user->update([
            'takeout_list'      => $itemList,
            'takeout_others'    => $others
        ]);

        // 個別避難計画に移動
        return redirect('/resident/myplan');
    }
}
