<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\DisasterRisk;

/**
 * リスク情報登録
 */
class ReportController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = DisasterRisk::where('user_id', Auth::guard()->user()->id)->get();
        return view('resident.report.index', ['data' => $data]);
    }

    /**
     * リスク情報入力画面
     *
     * @return void
     */
    public function create()
    {
        $mode = 'create';
        $data = null;
        if (request()->has('id')) {
            $data = DisasterRisk::find(request('id'));
            $mode = 'update';
        }
        return view('resident.report.create', ['mode' => $mode, 'data' => $data]);
    }

    /**
     * リスク情報登録
     *
     * @return void
     */
    public function exec()
    {
        $mode = request('mode');
        if ($mode == 'create') {
            // 新規登録
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

            DisasterRisk::create([
                'type'          => request('type'),
                'time'          => request('time'),
                'title'         => request('title'),
                'file1'         => $filename1,
                'detail1'       => request('detail1'),
                'file2'         => $filename2,
                'detail2'       => request('detail2'),
                'file3'         => $filename3,
                'detail3'       => request('detail3'),
                'latitude'      => $latlng[0],
                'longitude'     => $latlng[1],
                'user_id'       => Auth::guard()->user()->id,
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの登録が完了しました';
        } elseif ($mode == 'update') {
            // 更新
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

            $risk = DisasterRisk::find(request('id'));
            $risk->update([
                'type'          => request('type'),
                'time'          => request('time'),
                'title'         => request('title'),
                'file1'         => $filename1,
                'detail1'       => request('detail1'),
                'file2'         => $filename2,
                'detail2'       => request('detail2'),
                'file3'         => $filename3,
                'detail3'       => request('detail3'),
                'latitude'      => $latlng[0],
                'longitude'     => $latlng[1],
                'user_id'       => Auth::guard()->user()->id,
                'area_list_id'  => Auth::guard()->user()->area_list_id
            ]);
            $message = 'データの更新が完了しました';
        }

        // リスク情報登録のトップページに移動
        return redirect('/resident/report')->with('message', $message);
    }
}
