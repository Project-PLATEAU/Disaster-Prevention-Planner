<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EvacuationShelter;

/**
 * 地区一次避難場所
 */
class ShelterController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = EvacuationShelter::all();
        return view('org.shelter.index', ['data' => $data]);
    }

    /**
     * 入力画面
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の org_url にて設定
     *
     * @return void
     */
    public function create()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = EvacuationShelter::find(request('id'));
            $mode = 'update';
        }
        return view('org.shelter.create', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.org_url')]);
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
            EvacuationShelter::create([
                'type'          => request('type'),
                'disaster_type' => 0,
                'name'          => request('name'),
                'recital'       => request('recital'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $shelter = EvacuationShelter::find(request('id'));
            $shelter->update([
                'type'          => request('type'),
                'disaster_type' => 0,
                'name'          => request('name'),
                'recital'       => request('recital'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
            ]);
            $message = 'データの更新が完了しました';
        }

        // 地区一次避難場所トップページに移動
        return redirect('/org/shelter')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        EvacuationShelter::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
