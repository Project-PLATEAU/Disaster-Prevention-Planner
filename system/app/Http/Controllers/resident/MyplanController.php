<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Csv as CSVReader;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

use App\Models\EvacuationPlan;
use App\Models\User;
use App\Models\FamilyData;
use App\Models\EvacuationTiming;
use App\Models\EvacuationShelter;
use App\Models\EvacuationRoute;
use App\Models\UserContact;
use App\Models\BldgRisk;
use App\Models\CarryItemMaster;

/**
 * 個別避難計画
 */
class MyplanController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = EvacuationPlan::where('user_id', Auth::guard()->user()->id)->get();
        return view('resident.myplan.index', ['data' => $data]);
    }

    /**
     * 個別避難計画作成
     *
     * @return void
     */
    public function exec()
    {
        // 必要な情報を取得
        $userId = Auth::guard()->user()->id;
        $user = User::where('id', $userId)->first();
        $familyData = FamilyData::where('user_id', $userId)->get();
        $evacuationTiming = EvacuationTiming::where('user_id', $userId)->first();
        $shelter = EvacuationShelter::all();
        $contact= UserContact::where('user_id', $userId)->get();
        $route = EvacuationRoute::where('user_id', $userId)->first();
        $bldgRisk = BldgRisk::where('bldg_id', $user->bldg_id)->first();

        // テンプレートファイル読込
        $first = resource_path() . '/template/resident/template.xlsx';
        $reader = new XlsxReader();
        $spreadsheet = $reader->load($first);
        $sheet = $spreadsheet->getActiveSheet();

        // 各セルの設定
        $cell = array(
            '0' => array(
                '0' => 'Q13',
                '1' => 'Q15',
                '2' => 'Q17',
                '3' => 'Q19',
                '4' => 'Q21',
            ),
            '1' => array(
                '0' => 'Q28',
                '1' => 'Q30',
                '2' => 'Q32',
                '3' => 'Q34',
                '4' => 'Q36',
            ),
            '2' => array(
                '0' => 'Q43',
                '1' => 'Q45',
                '2' => 'Q47',
                '3' => 'Q49',
                '4' => 'Q51',
            ),
            '3' => array(
                '0' => 'Q58',
                '1' => 'Q60',
                '2' => 'Q62',
                '3' => 'Q64',
                '4' => 'Q66',
            ),
            '4' => array(
                '0' => 'Q80',
                '1' => 'Q82',
                '2' => 'Q84',
                '3' => 'Q86',
                '4' => 'Q88',
            ),
            '5' => array(
                '0' => 'Q95',
                '1' => 'Q97',
                '2' => 'Q99',
                '3' => 'Q101',
                '4' => 'Q103',
            ),
        );
        $attr1 = array(
            '1' => '健常者',
            '2' => '高齢者',
            '3' => '要支援者',
            '4' => '支援者'
        );
        $attr2 = array(
            '1' => '徒歩',
            '2' => '徒歩(高齢者)',
            '3' => '車',
            '4' => '車'
        );

        // 家族情報
        $count = 0;
        foreach ($familyData as $item) {
            $sheet->setCellValue($cell[$count][0], $item->name);
            $sheet->setCellValue($cell[$count][1], $attr1[$item->attr1]);
            $sheet->setCellValue($cell[$count][3], $attr2[$item->attr2]);
            $sheet->setCellValue($cell[$count][4], $item->others);
            $count++;
        }

        // 避難ルート検索画面のキャプチャ
        $rendering1 = MemoryDrawing::RENDERING_PNG;
        $mimetype1 = MemoryDrawing::MIMETYPE_PNG;
        $imgData1 = base64_decode(explode(',', $route->image)[1]);
        $drawing1 = new MemoryDrawing();
        $drawing1->setImageResource(imagecreatefromstring($imgData1));
        $drawing1->setRenderingFunction($rendering1);
        $drawing1->setMimeType($mimetype1);
        $drawing1->setCoordinates('C219');
        $drawing1->getShadow()->setVisible(true);
        $drawing1->setHeight(210);
        $drawing1->setWorksheet($sheet);

        // 自宅のリスク情報画面のキャプチャ
        $rendering2 = MemoryDrawing::RENDERING_PNG;
        $mimetype2 = MemoryDrawing::MIMETYPE_PNG;
        $imgData2 = base64_decode(explode(',', $user->risk_image)[1]);
        $drawing2 = new MemoryDrawing();
        $drawing2->setImageResource(imagecreatefromstring($imgData2));
        $drawing2->setRenderingFunction($rendering2);
        $drawing2->setMimeType($mimetype2);
        $drawing2->setCoordinates('C288');
        $drawing2->getShadow()->setVisible(true);
        $drawing2->setHeight(280);
        $drawing2->setWorksheet($sheet);

        // 避難のタイミング
        $timing = array(
            '1' => '避難しやすい服装に着替える',
            '2' => '避難する時に持っていくものを準備する',
            '3' => '今後の台風を調べ始める',
            '4' => '川の水位を調べ始める',
            '5' => '住んでいるところと上流の雨量を調べる',
            '6' => '安全なところに移動を始める',
            '7' => '避難完了',
        );
        $sheet->setCellValue('V146', $timing[$evacuationTiming->timing1]);
        $sheet->setCellValue('V150', $evacuationTiming->timing1_other);
        $sheet->setCellValue('V155', $timing[$evacuationTiming->timing2]);
        $sheet->setCellValue('V159', $evacuationTiming->timing2_other);
        $sheet->setCellValue('V164', $timing[$evacuationTiming->timing3]);
        $sheet->setCellValue('V168', $evacuationTiming->timing3_other);
        $sheet->setCellValue('V173', $timing[$evacuationTiming->timing4]);
        $sheet->setCellValue('V177', $evacuationTiming->timing4_other);
        $sheet->setCellValue('V182', $timing[$evacuationTiming->timing5]);
        $sheet->setCellValue('V186', $evacuationTiming->timing5_other);
        $sheet->setCellValue('V191', $timing[$evacuationTiming->timing6]);
        $sheet->setCellValue('V195', $evacuationTiming->timing6_other);
        $sheet->setCellValue('V200', $timing[$evacuationTiming->timing7]);
        $sheet->setCellValue('V204', $evacuationTiming->timing7_other);

        // 避難場所情報
        $shelterName = '(';
        $shelterRecital = '';
        foreach ($shelter as $item) {
            $shelterName = $item->name;
            $shelterRecital = $item->recital;
        }
        $sheet->setCellValue('Q251', $shelterName);
        $sheet->getStyle('Q253')->getAlignment()->setWrapText(true);
        $sheet->setCellValue('Q253', $shelterRecital);

        // 緊急連絡先
        $num = 0;
        foreach ($contact as $item) {
            if ($num == 0) {
                $sheet->setCellValue('Q264', $item->name);
                $sheet->setCellValue('Q266', $item->phone);
                if ($item->type == 1) {
                    $sheet->setCellValue('Q268', '家族・親族');
                } elseif ($item->type == 2) {
                    $sheet->setCellValue('Q268', 'ご近所');
                } elseif ($item->type == 3) {
                    $sheet->setCellValue('Q268', 'その他');
                }
                $num++;
            } else {
                $sheet->setCellValue('Q273', $item->name);
                $sheet->setCellValue('Q275', $item->phone);
                if ($item->type == 1) {
                    $sheet->setCellValue('Q277', '家族・親族');
                } elseif ($item->type == 2) {
                    $sheet->setCellValue('Q277', 'ご近所');
                } elseif ($item->type == 3) {
                    $sheet->setCellValue('Q277', 'その他');
                }
            }
        }

        // 非常持出のデータ変換
        $takeoutList = explode(',', $user->takeout_list);
        $takeoutOthers = $user->takeout_others;
        $carryItem = CarryItemMaster::all();
        $takeoutData = array();
        foreach ($carryItem as $item) {
            $tmp = array(
                'id'    => $item->id,
                'name'  => $item->name
            );
            $takeoutData[$item->id] = $item->name;
        }
        $list = '';
        foreach ($takeoutList as $item) {
            if ($list == '') {
                $list .= $takeoutData[$item];
            } else {
                $list .= "、" . $takeoutData[$item];
            }
        }

        // 自宅のリスク情報
        if ($bldgRisk) {
            $riverDepth = explode(',', $bldgRisk->river_flood_depth);
            $landslide = explode(',', $bldgRisk->landslide_type);
            $sheet->setCellValue('Q317', $riverDepth[4] . ' m');
            $sheet->setCellValue('Q319', '---');
            $sheet->setCellValue('Q321', '爛川');

            if ($landslide[0] == 1 || $landslide[0] == 3) {
                $sheet->setCellValue('Q326', '土砂災害警戒区域');
            } elseif ($landslide[0] == 2 || $landslide[0] == 4) {
                $sheet->setCellValue('Q326', '土砂災害特別警戒区域');
            } else {
                $sheet->setCellValue('Q326', '---');
            }
            if ($landslide[1] == 1 || $landslide[1] == 3) {
                $sheet->setCellValue('Q328', '土砂災害警戒区域');
            } elseif ($landslide[1] == 2 || $landslide[1] == 4) {
                $sheet->setCellValue('Q328', '土砂災害特別警戒区域');
            } else {
                $sheet->setCellValue('Q328', '---');
            }
            if ($landslide[2] == 1 || $landslide[2] == 3) {
                $sheet->setCellValue('Q330', '土砂災害警戒区域');
            } elseif ($landslide[2] == 2 || $landslide[2] == 4) {
                $sheet->setCellValue('Q330', '土砂災害特別警戒区域');
            } else {
                $sheet->setCellValue('Q330', '---');
            }

        }

        // 非常持出
        $sheet->getStyle('C341')->getAlignment()->setWrapText(true);
        $sheet->setCellValue('C341', $list);
        $sheet->getStyle('C354')->getAlignment()->setWrapText(true);
        $sheet->setCellValue('C354', $takeoutOthers);

        // 家族で共有する情報
        $sheet->getStyle('C368')->getAlignment()->setWrapText(true);
        $sheet->setCellValue('C368', $user->share);

        // Excelファイル作成
        $filename = $userId . '_' . date("YmdHis");
        $filename1 = $filename . '.xlsx';
        $writer = new XlsxWriter($spreadsheet);
        $writer->save(storage_path() . '/app/private/resident/excel/' . $filename1);

        // PDFファイル作成
        $filename2 = $filename . '.pdf';
        $cmd = '/usr/bin/soffice --headless --convert-to pdf --outdir ' . storage_path() . '/app/private/resident/pdf/' . ' ' . storage_path() . '/app/private/resident/excel/' . $filename1;
        exec($cmd, $output, $return);

        EvacuationPlan::create([
            'filename'  => $filename1 . ',' . $filename2,
            'user_id'   => $userId
        ]);

        // 個別避難計画のトップページに移動
        return redirect('/resident/myplan');
    }

    /**
     * 個別避難計画ダウンロード(Excel)
     *
     * @param int $id 個別避難計画ID
     * @return void
     */
    public function download($id)
    {
        $data = EvacuationPlan::find($id);
        $filename = explode(',', $data->filename);

        $name = '個別避難計画.xlsx';
        $path = Storage::path('resident\\excel\\' . $filename[0]);
        $mimeType = Storage::mimeType('resident\\excel\\' . $filename[0]);
        $headers = [['Content-Type' => $mimeType]];

        return response()->download($path, $name, $headers);
    }

    /**
     * 個別避難計画ダウンロード(PDF)
     *
     * @param int $id 個別避難計画ID
     * @return void
     */
    public function download2($id)
    {
        $data = EvacuationPlan::find($id);
        $filename = explode(',', $data->filename);

        $name = '個別避難計画.pdf';
        $path = Storage::path('resident\\pdf\\' . $filename[1]);
        $mimeType = Storage::mimeType('resident\\pdf\\' . $filename[1]);
        $headers = [['Content-Type' => $mimeType]];

        return response()->download($path, $name, $headers);
    }
}
