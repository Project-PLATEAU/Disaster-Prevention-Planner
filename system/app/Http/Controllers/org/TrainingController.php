<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dig;

/**
 * 災害図上訓練コンテンツ
 */
class TrainingController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = Dig::all();
        return view('org.training.index', ['data' => $data]);
    }

    /**
     * コンテンツ01
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の dig01_url にて設定
     *
     * @return void
     */
    public function cont1()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = Dig::find(request('id'));
            $mode = 'update';
        }
        return view('org.training.cont1', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.dig01_url')]);
    }

    /**
     * コンテンツ02
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の dig02_url にて設定
     *
     * @return void
     */
    public function cont2()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = Dig::find(request('id'));
            $mode = 'update';
        }
        return view('org.training.cont2', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.dig02_url')]);
    }

    /**
     * コンテンツ03
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の dig03_url にて設定
     *
     * @return void
     */
    public function cont3()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = Dig::find(request('id'));
            $mode = 'update';
        }
        return view('org.training.cont3', ['mode' => $mode, 'data' => $data, 'url' => config('reearth.dig03_url')]);
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
            Dig::create([
                'num'           => request('num'),
                'cont'          => request('cont'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $dig = Dig::find(request('id'));
            $dig->update([
                'num'           => request('num'),
                'cont'          => request('cont'),
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // 災害図上訓練コンテンツのトップページに移動
        return redirect('/org/training')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        Dig::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
