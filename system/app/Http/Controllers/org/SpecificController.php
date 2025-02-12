<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DistrictSpecific;
use App\Models\AreaMaster;

/**
 * 地区特性
 */
class SpecificController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = DistrictSpecific::findAreaListId(Auth::guard()->user()->area_list_id);
        return view('org.specific.index', ['data' => $data]);
    }

    /**
     * 入力画面
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の org_url2 にて設定
     *
     * @return void
     */
    public function create()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = DistrictSpecific::find(request('id'));
            $mode = 'update';
        }
        $type = AreaMaster::all();
        return view('org.specific.create', ['mode' => $mode, 'data' => $data, 'type' => $type, 'url' => config('reearth.org_url2')]);
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
            $filename1 = null;
            $file1 = request('file-element1');
            if (!is_null($file1)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename1 = $dateStr . '.' . $file1->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file1, $filename1);
            }

            $filename2 = null;
            $file2 = request('file-element2');
            if (!is_null($file2)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename2 = $dateStr . '.' . $file2->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file2, $filename2);
            }

            $filename3 = null;
            $file3 = request('file-element3');
            if (!is_null($file3)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename3 = $dateStr . '.' . $file3->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file3, $filename3);
            }

            $latlng = explode(',', request('latlng'));

            DistrictSpecific::create([
                'type'          => request('type'),
                'title'         => request('title'),
                'file1'         => $filename1,
                'detail1'       => request('detail1'),
                'file2'         => $filename2,
                'detail2'       => request('detail2'),
                'file3'         => $filename3,
                'detail3'       => request('detail3'),
                'latitude'      => $latlng[0],
                'longitude'     => $latlng[1],
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            $filename1 = null;
            $file1 = request('file-element1');
            if (!is_null($file1)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename1 = $dateStr . '.' . $file1->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file1, $filename1);
            }

            $filename2 = null;
            $file2 = request('file-element2');
            if (!is_null($file2)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename2 = $dateStr . '.' . $file2->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file2, $filename2);
            }

            $filename3 = null;
            $file3 = request('file-element3');
            if (!is_null($file3)) {
                $dateStr = date("YmdHis") . substr(explode(".", (microtime(true) . ""))[1], 0, 3);
                $filename3 = $dateStr . '.' . $file3->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('img', $file3, $filename3);
            }

            $latlng = explode(',', request('latlng'));

            $areaChar = DistrictSpecific::find(request('id'));
            $areaChar->update([
                'type'          => request('type'),
                'title'         => request('title'),
                'file1'         => $filename1,
                'detail1'       => request('detail1'),
                'file2'         => $filename2,
                'detail2'       => request('detail2'),
                'file3'         => $filename3,
                'detail3'       => request('detail3'),
                'latitude'      => $latlng[0],
                'longitude'     => $latlng[1],
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // 地区特有の情報トップページに移動
        return redirect('/org/specific')->with('message', $message);
    }

    /**
     * 削除
     *
     * @return void
     */
    public function delete()
    {
        DistrictSpecific::where('id', request('id'))->delete();

        return response()->json([
            'result'    => 1
        ]);
    }
}
