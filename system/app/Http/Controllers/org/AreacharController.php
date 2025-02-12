<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use App\Models\AreaCharacteristic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * 地区特性
 */
class AreacharController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = AreaCharacteristic::all();
        return view('org.areachar.index', ['data' => $data]);
    }

    /**
     * データ入力画面
     *
     * @return void
     */
    public function create()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = AreaCharacteristic::find(request('id'));
            $mode = 'update';
        }
        return view('org.areachar.create', ['mode' => $mode, 'data' => $data]);
    }

    /**
     * 登録、編集
     *
     * @return void
     */
    public function exec()
    {
        $mode = request('mode');
        if ($mode == 'create') {
            $filename = null;
            $file = request('file-element');
            if (!is_null($file)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename = $dateStr . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file, $filename);
            }

            AreaCharacteristic::create([
                'title'         => request('title'),
                'detail'        => request('detail'),
                'filename'      => $filename,
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $filename = null;
            $file = request('file-element');
            if (!is_null($file)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename = $dateStr . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file, $filename);
            }

            $areaChar = AreaCharacteristic::find(request('id'));
            if (is_null($filename)) {
                $areaChar->update([
                    'title'     => request('title'),
                    'detail'    => request('detail')
                ]);
            } else {
                $areaChar->update([
                    'title'     => request('title'),
                    'detail'    => request('detail'),
                    'filename'  => $filename
                ]);
            }

            $message = 'データの更新が完了しました';
        }

        // 地区特性トップページに移動
        return redirect('/org/areachar')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        AreaCharacteristic::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
