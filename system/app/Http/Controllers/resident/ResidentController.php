<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserContact;
use App\Models\FamilyData;
use Illuminate\Support\Facades\Auth;

/**
 * 住民情報
 */
class ResidentController extends Controller
{
    /**
     * トップページ
     *
     * ページ内に埋め込んであるRe:Earth Visualizer
     * config/reearth.php 内の resident_url にて設定
     *
     * @return void
     */
    public function index()
    {
        $id = Auth::guard()->user()->id;
        $user = User::where('id', $id)->first();

        // 家族情報を取得
        $num = 1;
        $family_flag = 0;
        $str = '';
        if (!is_null($user->num)) {
            $num = $user->num;
            $family_flag = 1;

            $familyData = FamilyData::where('user_id', $id)->get();
            foreach ($familyData as $item) {
                $str .= $item->name . ',' . $item->attr1 . ',' . $item->attr2 . ',' . $item->others . ',';
            }
        }

        // 緊急連絡先を取得
        $contact = null;
        $userContact = UserContact::where('user_id', $id)->get();
        if (!$userContact->isEmpty()) {
            $contact = array();
            $count = 0;
            foreach ($userContact as $item) {
                $contact[$count] = array(
                    'name'      => $item->name,
                    'phone'     => $item->phone,
                    'type'      => $item->type,
                );
                $count++;
            }
        }

        return view('resident.resident.index', ['user' => $user, 'contact' => $contact, 'family_flag' => $family_flag, 'family' => $str, 'num' => $num, 'url' => config('reearth.resident_url')]);
    }

    /**
     * 住民情報登録
     *
     * @return void
     */
    public function exec()
    {
        // ユーザ情報を更新
        $user = User::find(Auth::guard()->user()->id);
        $user->update([
            'name'      => request('name'),
            'num'       => request('family_num'),
            'attr1'     => request('support'),
            'attr2'     => request('pets'),
            'bldg_id'   => request('bldg_id'),
            'latitude'  => request('bldg_lat'),
            'longitude' => request('bldg_lng')
        ]);

        // 家族情報を登録
        // すでに登録されたデータがある場合には、一度削除してから再登録
        $familyData = FamilyData::where('user_id', Auth::guard()->user()->id)->get();
        if (!$familyData->isEmpty()) {
            FamilyData::deleteFamilyData(Auth::guard()->user()->id);
        }
        for ($i = 0; $i < request('family_num'); $i++) {
            FamilyData::create([
                'name'      => request('family_' . $i . '_name'),
                'attr1'     => request('family_' . $i . '_type1'),
                'attr2'     => request('family_' . $i . '_type2'),
                'others'    => request('family_' . $i . '_others'),
                'user_id'   => Auth::guard()->user()->id
            ]);
        }

        // 緊急連絡先を登録
        // すでに登録されたデータがある場合には、一度削除してから再登録
        $userContact = UserContact::where('user_id', Auth::guard()->user()->id)->get();
        if (!$userContact->isEmpty()) {
            UserContact::deleteUserContact(Auth::guard()->user()->id);
        }
        UserContact::create([
            'name'      => request('contact01_name'),
            'phone'     => request('contact01_phone'),
            'type'      => request('contact01_type'),
            'user_id'   => Auth::guard()->user()->id
        ]);
        UserContact::create([
            'name'      => request('contact02_name'),
            'phone'     => request('contact02_phone'),
            'type'      => request('contact02_type'),
            'user_id'   => Auth::guard()->user()->id
        ]);

        // リスク情報に移動
        return redirect('/resident/risk');
    }
}
