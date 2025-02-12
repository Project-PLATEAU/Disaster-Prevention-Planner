<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * 避難情報
 */
class EvacuationController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $user = User::where('id', Auth::guard()->user()->id)->first();
        return view('resident.evacuation.index', ['data' => $user]);
    }

    /**
     * 避難情報登録
     *
     * @return void
     */
    public function exec()
    {
        // ユーザ情報を更新
        $user = User::find(Auth::guard()->user()->id);
        $user->update([
            'evacuation1'   => request('evacuation1'),
            'evacuation2'   => request('evacuation2'),
            'evacuation3'   => request('evacuation3'),
            'share'         => request('share'),
        ]);

        // 避難ルート検索に移動
        return redirect('/resident/route');
    }
}
