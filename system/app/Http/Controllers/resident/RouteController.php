<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EvacuationRoute;
use Illuminate\Support\Facades\Auth;

/**
 * 避難ルート検索
 */
class RouteController extends Controller
{
    /**
     * トップページ
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の route_url にて設定
     *
     * @return void
     */
    public function index()
    {
        $user = User::where('id', Auth::guard()->user()->id)->first();
        return view('resident.route.index', ['user' => $user, 'url' => config('reearth.route_url')]);
    }

    /**
     * 避難ルート検索登録
     *
     * @return void
     */
    public function exec()
    {
        // 避難ルートを検索
        // すでに登録されたデータがある場合には、一度削除してから再登録
        $route = EvacuationRoute::where('user_id', Auth::guard()->user()->id)->get();
        if (!$route->isEmpty()) {
            EvacuationRoute::deleteFamilyData(Auth::guard()->user()->id);
        }
        // 避難ルート検索で利用した、出発地・経由地・目的地およびキャプチャ画像を保存
        EvacuationRoute::create([
            'departure_id'      => request('departure'),
            'stopover_id'       => request('stopover'),
            'destination_id'    => request('destination'),
            'image'             => request('image'),
            'user_id'           => Auth::guard()->user()->id
        ]);

        // 避難のタイミングに移動
        return redirect('/resident/timeline');
    }
}
