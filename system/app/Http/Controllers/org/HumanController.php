<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\HumanResource;
use App\Models\SkillMaster;

/**
 * 人的資源
 */
class HumanController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $resources = HumanResource::all();
        $skill = SkillMaster::all();

        // スキルマスタ
        $skillArray = array();
        foreach ($skill as $item) {
            $skillArray[$item->id] = $item->name;
        }

        $data = array();
        foreach ($resources as $item) {
            $tmp = array(
                'id'        => $item->id,
                'name'      => $item->name,
                'phone'     => $item->phone,
                'recital'   => $item->recital,
                'skill1'    => $item->skill1 == 0 ? '' : $skillArray[$item->skill1],
                'skill2'    => $item->skill2 == 0 ? '' : $skillArray[$item->skill2],
                'skill3'    => $item->skill3 == 0 ? '' : $skillArray[$item->skill3],
                'skill4'    => $item->skill4 == 0 ? '' : $skillArray[$item->skill4],
            );
            array_push($data, $tmp);
        }
        return view('org.human.index', ['data' => $data]);
    }

    /**
     * 入力画面
     *
     * @return void
     */
    public function create()
    {
        $mode = 'create';
        $skill = SkillMaster::all();
        $data = null;
        if (request()->has('id')) {
            $data = HumanResource::find(request('id'));
            $mode = 'update';
        }
        return view('org.human.create', ['mode' => $mode, 'data' => $data, 'skill' => $skill]);
    }

    /**
     * 登録
     *
     * @return void
     */
    public function exec()
    {
        $mode = request('mode');
        if ($mode == 'create') {
            HumanResource::create([
                'name'          => request('name'),
                'phone'         => request('phone'),
                'skill1'        => request('skill1'),
                'skill2'        => request('skill2'),
                'skill3'        => request('skill3'),
                'skill4'        => request('skill4'),
                'recital'       => request('recital'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $human = HumanResource::find(request('id'));
            $human->update([
                'name'          => request('name'),
                'phone'         => request('phone'),
                'skill1'        => request('skill1'),
                'skill2'        => request('skill2'),
                'skill3'        => request('skill3'),
                'skill4'        => request('skill4'),
                'recital'       => request('recital'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // 人的資源トップページに移動
        return redirect('/org/human')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        HumanResource::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
