<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * リスク情報確認
 */
class RiskController extends Controller
{
    /**
     * トップページ
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の risk_url にて設定
     *
     * @return void
     */
    public function index()
    {
        $user = User::where('id', Auth::guard()->user()->id)->first();
        return view('resident.risk.index', ['user' => $user, 'url' => config('reearth.risk_url')]);
    }

    /**
     * リスク情報画像登録
     *
     * @return void
     */
    public function exec()
    {
        // 自宅のリスク情報のキャプチャ画像を保存
        $user = User::find(Auth::guard()->user()->id);
        $user->update([
            'risk_image'    => request('risk-image'),
        ]);

        // 避難情報に移動
        return view('resident.evacuation.index');
    }
}
