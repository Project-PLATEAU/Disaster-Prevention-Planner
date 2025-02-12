<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use App\Models\AreaImage;
use Illuminate\Support\Facades\Auth;

/**
 * 地区防災計画に掲載する各種地図を取得、保存する
 */
class MapController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = AreaImage::where('area_list_id', Auth::guard()->user()->area_list_id)->first();
        if (is_null($data)) {
            AreaImage::create([
                'name'          => '各地図画像',
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
        }
        return view('org.map.index');
    }

    /**
     * 地図表示
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の org_url2 にて設定
     *
     * typeでどの地図なのかを指定する
     * 1:倉庫
     * 2:地区一次避難場所
     * 3:緊急連絡先
     * 4:地区特有の情報
     * 5:自治会館
     *
     * @param int $type どの地図を表示するか
     * @return void
     */
    public function map($type)
    {
        return view('org.map.map', ['type' => $type, 'url' => config('reearth.org_url2')]);
    }

    /**
     * 地図のキャプチャを保存
     *
     * @return void
     */
    public function exec()
    {
        $type = request('type');
        $image = request('image');

        $areaImage = AreaImage::where('area_list_id', Auth::guard()->user()->area_list_id)->first();
        if ($type == '1') {
            $areaImage->update([
                'image01'   => $image
            ]);
        } elseif ($type == '2') {
            $areaImage->update([
                'image02'   => $image
            ]);
        } elseif ($type == '3') {
            $areaImage->update([
                'image03'   => $image
            ]);
        } elseif ($type == '4') {
            $areaImage->update([
                'image04'   => $image
            ]);
        } elseif ($type == '5') {
            $areaImage->update([
                'image05'   => $image
            ]);
        }

        return redirect('/org/map');
    }
}
