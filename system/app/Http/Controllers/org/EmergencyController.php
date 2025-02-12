<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AreaContact;

/**
 * 緊急連絡先
 */
class EmergencyController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = AreaContact::all();
        return view('org.emergency.index', ['data' => $data]);
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
            $data = AreaContact::find(request('id'));
            $mode = 'update';
        }
        return view('org.emergency.create', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.org_url')]);
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
            AreaContact::create([
                'name'          => request('name'),
                'phone'         => request('phone'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $contact = AreaContact::find(request('id'));
            $contact->update([
                'name'          => request('name'),
                'phone'         => request('phone'),
                'bldg_id'       => request('bldgId'),
                'latitude'      => request('bldgLat'),
                'longitude'     => request('bldgLng'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // 緊急連絡先トップページに移動
        return redirect('/org/emergency')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        AreaContact::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
