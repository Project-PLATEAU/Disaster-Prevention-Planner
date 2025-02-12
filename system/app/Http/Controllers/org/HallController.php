<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CommunityHall;

/**
 * 自治会館
 */
class HallController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = CommunityHall::all();
        return view('org.hall.index', ['data' => $data]);
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
            $data = CommunityHall::find(request('id'));
            $mode = 'update';
        }
        return view('org.hall.create', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.org_url')]);
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
            CommunityHall::create([
                'name'          => request('name'),
                'detail'        => request('detail'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $hall = CommunityHall::find(request('id'));
            $hall->update([
                'name'          => request('name'),
                'detail'        => request('detail'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // 自治会館トップページに移動
        return redirect('/org/hall')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        CommunityHall::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
