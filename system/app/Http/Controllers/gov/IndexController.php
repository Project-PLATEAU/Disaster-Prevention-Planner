<?php

namespace App\Http\Controllers\gov;

use App\Http\Controllers\Controller;
use App\Models\DisasterPreventionPlan;
use Illuminate\Support\Facades\Storage;

/**
 * 行政トップページ
 */
class IndexController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = DisasterPreventionPlan::all();
        return view('gov.index.index', ['data' => $data]);
    }

    /**
     * 地区防災計画管理
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の org_url にて設定
     *
     * @return void
     */
    public function map()
    {
        return view('gov.index.map', ['url' => config('reearth.gov_url')]);
    }

    /**
     * 地区防災計画ダウンロード
     *
     * @param [int] $id 地区防災計画ID
     * @return void
     */
    public function download($id)
    {
        $data = DisasterPreventionPlan::find($id);
        $filename = explode(',', $data->filename);

        $name = '地区防災計画.pdf';
        $path = Storage::path('org\\pdf\\' . $filename[1]);
        $mimeType = Storage::mimeType('org\\pdf\\' . $filename[1]);
        $headers = [['Content-Type' => $mimeType]];

        return response()->download($path, $name, $headers);
    }
}
