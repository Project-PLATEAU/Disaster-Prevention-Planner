<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Csv as CSVReader;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

use App\Models\DisasterPreventionPlan;
use App\Models\AreaImage;
use App\Models\AreaCharacteristic;
use App\Models\Supplies;
use App\Models\EvacuationShelter;
use App\Models\HumanResource;
use App\Models\AreaContact;
use App\Models\CommunityHall;
use App\Models\Dig;
use App\Models\SkillMaster;

/**
 * 地区防災計画
 */
class DppController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $data = DisasterPreventionPlan::all();
        return view('org.dpp.index', ['data' => $data]);
    }

    /**
     * 地区防災計画を作成する
     *
     * @return void
     */
    public function exec()
    {
        $areaListId = Auth::guard()->user()->area_list_id;

        // テンプレートファイルを読み込む
        $first = $first = resource_path() . '/template/org/template.xlsx';

        $reader = new XlsxReader();
        $spreadsheet = $reader->load($first);
        $sheet = $spreadsheet->getActiveSheet();

        // 地区防災計画を作成するためのデータを取得
        $areaImage = AreaImage::where('area_list_id', $areaListId)->first();
        $areaChar = AreaCharacteristic::where('area_list_id', $areaListId)->get();
        $supplies = Supplies::findAll();
        $shelter = EvacuationShelter::where('area_list_id', $areaListId)->get();
        $humanResource = HumanResource::where('area_list_id', $areaListId)->get();
        $areaContact = AreaContact::where('area_list_id', $areaListId)->get();
        $communityHall = CommunityHall::where('area_list_id', $areaListId)->get();
        $dig = Dig::where('area_list_id', $areaListId)->get();
        $skillMaster = SkillMaster::all();

        $skill = array();
        foreach ($skillMaster as $item) {
            $skill[$item->id] = $item->name;
        }

        $digCont = array(
            '1' => array(),
            '2' => array(),
            '3' => array()
        );
        foreach ($dig as $item) {
            array_push($digCont[$item->num], $item);
        }

        // 地区特性
        $areaCharCell = 80;
        $areaCharCount = 0;
        foreach ($areaChar as $item) {
            $sheet->setCellValue('Q' . ($areaCharCell + ($areaCharCount * 75)), $item->title);
            if ($areaCharCount == 5) {
                $sheet->getStyle('Q' . ($areaCharCell + 2 + ($areaCharCount * 75)))->getFont()->setSize('8');
            }
            $sheet->getStyle('Q' . ($areaCharCell + 2 + ($areaCharCount * 75)))->getAlignment()->setWrapText(true);
            $sheet->setCellValue('Q' . ($areaCharCell + 2 + ($areaCharCount * 75)), $item->detail);
            $drawing = new Drawing();
            $drawing->setPath(storage_path() . '/app/public/img/' . $item->filename);
            $drawing->setCoordinates('D' . ($areaCharCell + 21 + ($areaCharCount * 75)));
            if ($areaCharCount == 0 || $areaCharCount == 5) {
                $drawing->setWidth(550);
            } else {
                $drawing->setWidth(370);
            }
            $drawing->setWorksheet($sheet);
            $areaCharCount++;
        }

        // 倉庫キャプチャ画像
        $rendering = MemoryDrawing::RENDERING_PNG;
        $mimetype = MemoryDrawing::MIMETYPE_PNG;
        $imgData1 = base64_decode(explode(',', $areaImage->image01)[1]);
        $drawing1 = new MemoryDrawing();
        $drawing1->setImageResource(imagecreatefromstring($imgData1));
        $drawing1->setRenderingFunction($rendering);
        $drawing1->setMimeType($mimetype);
        $drawing1->setCoordinates('C530');
        $drawing1->getShadow()->setVisible(true);
        $drawing1->setHeight(250);
        $drawing1->setWorksheet($sheet);

        // 物資・資材の備蓄
        $supplyCell = 552;
        $supplyCount = 0;
        foreach ($supplies as $item) {
            if ($supplyCount <= 23) {
                $sheet->setCellValue('C' . ($supplyCell + ($supplyCount * 2)), $item->m1_name);
                $sheet->setCellValue('AA' . ($supplyCell + ($supplyCount * 2)), $item->s_amount);
                $sheet->setCellValue('AJ' . ($supplyCell + ($supplyCount * 2)), $item->w_name);
            } else if ($supplyCount == 24) {
                $supplyCell += 7;
                $sheet->setCellValue('C' . ($supplyCell + ($supplyCount * 2)), $item->m1_name);
                $sheet->setCellValue('AA' . ($supplyCell + ($supplyCount * 2)), $item->s_amount);
                $sheet->setCellValue('AJ' . ($supplyCell + ($supplyCount * 2)), $item->w_name);
            } else {
                $sheet->setCellValue('C' . ($supplyCell + ($supplyCount * 2)), $item->m1_name);
                $sheet->setCellValue('AA' . ($supplyCell + ($supplyCount * 2)), $item->s_amount);
                $sheet->setCellValue('AJ' . ($supplyCell + ($supplyCount * 2)), $item->w_name);
            }
            $supplyCount++;
        }

        // 地区一次避難場所キャプチャ画像
        $imgData2 = base64_decode(explode(',', $areaImage->image02)[1]);
        $drawing2 = new MemoryDrawing();
        $drawing2->setImageResource(imagecreatefromstring($imgData2));
        $drawing2->setRenderingFunction($rendering);
        $drawing2->setMimeType($mimetype);
        $drawing2->setCoordinates('C680');
        $drawing2->getShadow()->setVisible(true);
        $drawing2->setHeight(250);
        $drawing2->setWorksheet($sheet);

        // 地区一次避難場所
        $shelterCell = 705;
        $shelterCount = 0;
        foreach ($shelter as $item) {
            $sheet->setCellValue('Q' . ($shelterCell + ($shelterCount * 7)), $item->name);
            $sheet->setCellValue('Q' . ($shelterCell + 2 + ($shelterCount * 7)), $item->recital);
            $shelterCount++;
        }

        // 人的資源
        $humanCell = 757;
        $humanCount = 0;
        foreach ($humanResource as $item) {
            $sheet->setCellValue('C' . ($humanCell + ($humanCount * 2)), $item->name);
            $sheet->setCellValue('O' . ($humanCell + ($humanCount * 2)), $item->phone);
            $sheet->setCellValue('AJ' . ($humanCell + ($humanCount * 2)), $item->recital);
            $str = '';
            if ($item->skill1 != 0) {
                $str = $skill[$item->skill1];
            }
            if ($item->skill2 != 0) {
                $str .= ',' . $skill[$item->skill2];
            }
            if ($item->skill3 != 0) {
                $str .= ',' . $skill[$item->skill3];
            }
            if ($item->skill4 != 0) {
                $str .= ',' . $skill[$item->skill4];
            }
            $sheet->setCellValue('AA' . ($humanCell + ($humanCount * 2)), $str);
            $humanCount++;
        }

        // 連絡体制キャプチャ画像
        $imgData3 = base64_decode(explode(',', $areaImage->image06)[1]);
        $drawing3 = new MemoryDrawing();
        $drawing3->setImageResource(imagecreatefromstring($imgData3));
        $drawing3->setRenderingFunction($rendering);
        $drawing3->setMimeType($mimetype);
        $drawing3->setCoordinates('C830');
        $drawing3->setHeight(790);
        $drawing3->setWorksheet($sheet);

        // 緊急連絡先キャプチャ画像
        $imgData4 = base64_decode(explode(',', $areaImage->image03)[1]);
        $drawing4 = new MemoryDrawing();
        $drawing4->setImageResource(imagecreatefromstring($imgData4));
        $drawing4->setRenderingFunction($rendering);
        $drawing4->setMimeType($mimetype);
        $drawing4->setCoordinates('C905');
        $drawing4->getShadow()->setVisible(true);
        $drawing4->setHeight(250);
        $drawing4->setWorksheet($sheet);

        // 緊急連絡先
        $areaContactCell = 927;
        $areaContactCount = 0;
        foreach ($areaContact as $item) {
            $sheet->setCellValue('C' . ($areaContactCell + ($areaContactCount * 2)), $item->name);
            $sheet->setCellValue('O' . ($areaContactCell + ($areaContactCount * 2)), $item->phone);
            $areaContactCount++;
        }

        // 地区特有の情報キャプチャ画像
        $imgData5 = base64_decode(explode(',', $areaImage->image04)[1]);
        $drawing5 = new MemoryDrawing();
        $drawing5->setImageResource(imagecreatefromstring($imgData5));
        $drawing5->setRenderingFunction($rendering);
        $drawing5->setMimeType($mimetype);
        $drawing5->setCoordinates('C980');
        $drawing5->getShadow()->setVisible(true);
        $drawing5->setHeight(250);
        $drawing5->setWorksheet($sheet);

        // 自治会館キャプチャ画像
        $imgData6 = base64_decode(explode(',', $areaImage->image05)[1]);
        $drawing6 = new MemoryDrawing();
        $drawing6->setImageResource(imagecreatefromstring($imgData6));
        $drawing6->setRenderingFunction($rendering);
        $drawing6->setMimeType($mimetype);
        $drawing6->setCoordinates('C1055');
        $drawing6->getShadow()->setVisible(true);
        $drawing6->setHeight(250);
        $drawing6->setWorksheet($sheet);

        // 自治会館
        $hallCell = 1080;
        $hallCount = 0;
        foreach ($shelter as $item) {
            $sheet->setCellValue('Q' . ($hallCell + ($hallCount * 7)), $item->name);
            $sheet->setCellValue('Q' . ($hallCell + 2 + ($hallCount * 7)), $item->recital);
            $hallCount++;
        }

        // 災害図上訓練コンテンツ01
        $dig1Cell = array('0' => '1159', '1' => '1172', '2' => '1186');
        $dig1Count = 0;
        foreach ($digCont['1'] as $item) {
            $sheet->getStyle('C' . $dig1Cell[$dig1Count])->getAlignment()->setWrapText(true);
            $sheet->setCellValue('C' . $dig1Cell[$dig1Count], $item['cont']);
            $dig1Count++;
        }

        // 災害図上訓練コンテンツ02
        $dig2Cell = array('0' => '1234', '1' => '1247', '2' => '1261');
        $dig2Count = 0;
        foreach ($digCont['2'] as $item) {
            $sheet->getStyle('C' . $dig2Cell[$dig2Count])->getAlignment()->setWrapText(true);
            $sheet->setCellValue('C' . $dig2Cell[$dig2Count], $item['cont']);
            $dig2Count++;
        }

        // 災害図上訓練コンテンツ03
        $dig3Cell = array('0' => '1309', '1' => '1322', '2' => '1336');
        $dig3Count = 0;
        foreach ($digCont['3'] as $item) {
            $sheet->getStyle('C' . $dig3Cell[$dig3Count])->getAlignment()->setWrapText(true);
            $sheet->setCellValue('C' . $dig3Cell[$dig3Count], $item['cont']);
            $dig3Count++;
        }

        // Excelファイルを保存
        $filename = $areaListId . '_' . date("YmdHis");
        $filename1 = $filename . '.xlsx';
        $writer = new XlsxWriter($spreadsheet);
        $writer->save(storage_path() . '/app/private/org/excel/' . $filename1);

        // ExcelファイルからPDFファイルを作成
        $filename2 = $filename . '.pdf';
        $cmd = '/usr/bin/soffice --headless --convert-to pdf --outdir ' . storage_path() . '/app/private/org/pdf' . ' ' . storage_path() . '/app/private/org/excel/' . $filename1;
        exec($cmd, $output, $return);

        // データベースに保存
        DisasterPreventionPlan::create([
            'filename'      => $filename1 . ',' . $filename2,
            'area_list_id'  => $areaListId
        ]);

        return redirect('/org/dpp');
    }

    /**
     * 地区防災計画をダウンロード(Excelファイル)
     *
     * @param int $id 地区防災計画テーブルのID
     * @return void
     */
    public function download($id)
    {
        $data = DisasterPreventionPlan::find($id);
        $filename = explode(',', $data->filename);

        $name = '地区防災計画.xlsx';
        $path = Storage::path('org/excel/' . $filename[0]);
        $mimeType = Storage::mimeType('org/excel/' . $filename[0]);
        $headers = [['Content-Type' => $mimeType]];

        return response()->download($path, $name, $headers);
    }

    /**
     * 地区防災計画をダウンロード(PDFファイル)
     *
     * @param int $id 地区防災計画テーブルのID
     * @return void
     */
    public function download2($id)
    {
        $data = DisasterPreventionPlan::find($id);
        $filename = explode(',', $data->filename);

        $name = '地区防災計画.pdf';
        $path = Storage::path('org/pdf/' . $filename[1]);
        $mimeType = Storage::mimeType('org/pdf/' . $filename[1]);
        $headers = [['Content-Type' => $mimeType]];

        return response()->download($path, $name, $headers);
    }
}
