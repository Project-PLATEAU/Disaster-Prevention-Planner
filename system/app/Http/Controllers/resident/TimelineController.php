<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EvacuationTiming;

/**
 * 避難のタイミング
 */
class TimelineController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = EvacuationTiming::find(Auth::guard()->user()->id);
        return view('resident.timeline.index', ['data' => $data]);
    }

    /**
     * 避難のタイミング登録
     *
     * @return void
     */
    public function exec()
    {
        $data = EvacuationTiming::find(Auth::guard()->user()->id);
        // データが存在していなければ新規作成、存在していれば更新
        if (is_null($data)) {
            EvacuationTiming::create([
                'timing1'           => request('timing1'),
                'timing1_other'     => request('timing1_others'),
                'timing2'           => request('timing2'),
                'timing2_other'     => request('timing2_others'),
                'timing3'           => request('timing3'),
                'timing3_other'     => request('timing3_others'),
                'timing4'           => request('timing4'),
                'timing4_other'     => request('timing4_others'),
                'timing5'           => request('timing5'),
                'timing5_other'     => request('timing5_others'),
                'timing6'           => request('timing6'),
                'timing6_other'     => request('timing6_others'),
                'timing7'           => request('timing7'),
                'timing7_other'     => request('timing7_others'),
                'user_id'           => Auth::guard()->user()->id
            ]);
        } else {
            $timing = EvacuationTiming::find(Auth::guard()->user()->id);
            $timing->update([
                'timing1'           => request('timing1'),
                'timing1_other'     => request('timing1_others'),
                'timing2'           => request('timing2'),
                'timing2_other'     => request('timing2_others'),
                'timing3'           => request('timing3'),
                'timing3_other'     => request('timing3_others'),
                'timing4'           => request('timing4'),
                'timing4_other'     => request('timing4_others'),
                'timing5'           => request('timing5'),
                'timing5_other'     => request('timing5_others'),
                'timing6'           => request('timing6'),
                'timing6_other'     => request('timing6_others'),
                'timing7'           => request('timing7'),
                'timing7_other'     => request('timing7_others'),
            ]);
        }

        // 非常持出に移動
        return redirect('/resident/carry');
    }
}
