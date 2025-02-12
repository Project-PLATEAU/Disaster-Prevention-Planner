<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaterialItemMaster;
use App\Models\MaterialTypeMaster;
use App\Models\SkillMaster;
use App\Models\AreaMaster;

/**
 * マスタ情報コントローラ
 */
class MasterController extends Controller
{
    /**
     * 物資リスト 大項目
     *
     * @return void
     */
    public function supply1()
    {
        $data = MaterialTypeMaster::all();
        return view('org.master.supply1', ['data' => $data, 'message' => '']);
    }

    /**
     * 物資リスト 小項目
     *
     * @return void
     */
    public function supply2()
    {
        $typeData = MaterialTypeMaster::all();
        $itemData = MaterialItemMaster::all();

        $typeList = array();
        foreach ($typeData as $item) {
            $typeList[$item->id] = $item->name;
        }

        // 物資リスト大項目との紐づけ
        $itemList = array();
        foreach ($itemData as $item) {
            $tmp = array(
                'id'        => $item->id,
                'name'      => $item->name,
                'parent'    => $typeList[$item->material_type_master_id]
            );
            array_push($itemList, $tmp);
        }

        return view('org.master.supply2', ['data' => $itemList, 'message' => '']);
    }

    /**
     * 技能資格
     *
     * @return void
     */
    public function skill()
    {
        $data = SkillMaster::all();
        return view('org.master.skill', ['data' => $data, 'message' => '']);
    }

    /**
     * 地区特有情報
     *
     * @return void
     */
    public function area()
    {
        $data = AreaMaster::all();
        return view('org.master.area', ['data' => $data, 'message' => '']);
    }

    /**
     * 各マスタの登録用ページを表示する
     *
     * modeでどのマスタなのかを指定する
     * 1:物資リスト 大項目
     * 2:物資リスト 小項目
     * 3:技能資格
     * 4:地区特有情報
     *
     * mode2で新規登録か更新かを指定する
     * create:新規登録
     * update:更新
     *
     * @return void
     */
    public function create()
    {
        $mode = request('mode');
        $mode2 = 'create';

        $data = null;
        $type = null;
        if (request()->has('id')) {
            $id = request('id');

            if ($mode == '1') {
                $data = MaterialTypeMaster::find($id);
            } elseif ($mode == '2') {
                $data = MaterialItemMaster::find($id);
                $type = MaterialTypeMaster::all();
            } elseif ($mode == '3') {
                $data = SkillMaster::find($id);
            } elseif ($mode == '4') {
                $data = AreaMaster::find($id);
            }
            $mode2 = 'update';
        }

        if ($mode == '2') {
            $type = MaterialTypeMaster::all();
        }

        return view('org.master.create', ['mode' => $mode, 'mode2' => $mode2, 'data' => $data, 'type' => $type]);
    }

    /**
     * 各マスタの登録をする
     *
     * modeでどのマスタなのかを指定する
     * 1:物資リスト 大項目
     * 2:物資リスト 小項目
     * 3:技能資格
     * 4:地区特有情報
     *
     * mode2で新規登録か更新かを指定する
     * create:新規登録
     * update:更新
     *
     * @return void
     */
    public function exec()
    {
        $mode = request('mode');
        $mode2 = request('mode2');

        $message = '';
        $link = '';
        if ($mode == '1') {
            if ($mode2 == 'create') {
                MaterialTypeMaster::create([
                    'name'  => request('name')
                ]);
                $message = 'データの登録が完了しました';
            } elseif ($mode2 == 'update') {
                $materialTypeMaster = MaterialTypeMaster::find(request('id'));
                $materialTypeMaster->update([
                    'name'  => request('name')
                ]);
                $message = 'データの更新が完了しました';
            }
            $link = '/org/master/supply1';
        } elseif ($mode == '2') {
            if ($mode2 == 'create') {
                MaterialItemMaster::create([
                    'name'                      => request('name'),
                    'material_type_master_id'   => request('type')
                ]);
                $message = 'データの登録が完了しました';
            } elseif ($mode2 == 'update') {
                $materialItemMaster = MaterialItemMaster::find(request('id'));
                $materialItemMaster->update([
                    'name'                      => request('name'),
                    'material_type_master_id'   => request('type')
                ]);
                $message = 'データの更新が完了しました';
            }
            $link = '/org/master/supply2';
        } elseif ($mode == '3') {
            if ($mode2 == 'create') {
                SkillMaster::create([
                    'name'  => request('name')
                ]);
                $message = 'データの登録が完了しました';
            } elseif ($mode2 == 'update') {
                $skillMaster = SkillMaster::find(request('id'));
                $skillMaster->update([
                    'name'  => request('name')
                ]);
                $message = 'データの更新が完了しました';
            }
            $link = '/org/master/skill';
        } elseif ($mode == '4') {
            if ($mode2 == 'create') {
                AreaMaster::create([
                    'name'  => request('name')
                ]);
                $message = 'データの登録が完了しました';
            } elseif ($mode2 == 'update') {
                $areaMaster = AreaMaster::find(request('id'));
                $areaMaster->update([
                    'name'  => request('name')
                ]);
                $message = 'データの更新が完了しました';
            }
            $link = '/org/master/area';
        }
        return redirect($link)->with('message', $message);
    }

    /**
     * 各マスタの情報を削除(非表示)にする
     *
     * マスタを物理的に削除すると既存のデータに影響があるので非表示にする
     *
     * @return void
     */
    public function delete()
    {
        $mode = request('mode');
        $id = request('id');

        if ($mode == '1') {
            $materialTypeMaster = MaterialTypeMaster::find($id);
            $materialTypeMaster->update([
                'view'  => 0
            ]);
        } elseif ($mode == '2') {
            $materialItemMaster = MaterialItemMaster::find($id);
            $materialItemMaster->update([
                'view'  => 0
            ]);
        } elseif ($mode == '3') {
            $skillMaster = SkillMaster::find($id);
            $skillMaster->update([
                'view'  => 0
            ]);
        } elseif ($mode == '4') {
            $areaMaster = AreaMaster::find($id);
            $areaMaster->update([
                'view'  => 0
            ]);
        }

        return response()->json([
            'status'    => 'success',
            'result'    => 1
        ], 200);
    }
}
