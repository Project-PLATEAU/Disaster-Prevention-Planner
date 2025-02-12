<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactSystem;
use App\Models\AreaImage;

/**
 * 連絡体制
 */
class ContactController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        $contact = ContactSystem::findAreaListId(Auth::guard()->user()->area_list_id);

        if ($contact->isEmpty()) {
            $data = array();
            for ($i = 1; $i <= 43; $i++) {
                $data[$i] = array(
                    'role'  => '　',
                    'name'  => '　',
                    'phone' => '　'
                );
            }
        } else {
            $data = array();
            foreach ($contact as $item) {
                $data[$item['position']] = array(
                    'role'  => $item['role'] == '' ? '　' : $item['role'],
                    'name'  => $item['name'] == '' ? '　' : $item['name'],
                    'phone' => $item['phone'] == '' ? '　' : $item['phone']
                );
            }
        }

        return view('org.contact.index', ['data' => $data]);
    }

    /**
     * 入力画面
     *
     * @return void
     */
    public function edit()
    {
        $contact = ContactSystem::findAreaListId(Auth::guard()->user()->area_list_id);

        if ($contact->isEmpty()) {
            $data = array();
            for ($i = 1; $i <= 43; $i++) {
                $data[$i] = array(
                    'role'  => '',
                    'name'  => '',
                    'phone' => ''
                );
            }
        } else {
            $data = array();
            foreach ($contact as $item) {
                $data[$item['position']] = array(
                    'role'  => $item['role'],
                    'name'  => $item['name'],
                    'phone' => $item['phone']
                );
            }
        }
        return view('org.contact.edit', ['data' => $data]);
    }

    /**
     * 登録
     *
     * @return void
     */
    public function exec()
    {
        $data = ContactSystem::findAreaListId(Auth::guard()->user()->area_list_id);

        if ($data->isEmpty()) {
            for ($i = 1; $i <= 43; $i++) {
                ContactSystem::create([
                    'position'      => $i,
                    'role'          => request('title' . $i),
                    'name'          => request('name' . $i),
                    'phone'         => request('phone' . $i),
                    'area_list_id'  => Auth::guard()->user()->area_list_id
                ]);
            }
        } else {
            ContactSystem::deleteContact(Auth::guard()->user()->area_list_id);
            for ($i = 1; $i <= 43; $i++) {
                ContactSystem::create([
                    'position'      => $i,
                    'role'          => request('title' . $i),
                    'name'          => request('name' . $i),
                    'phone'         => request('phone' . $i),
                    'area_list_id'  => Auth::guard()->user()->area_list_id
                ]);
            }
        }

        // 連絡体制トップページに移動
        return redirect('/org/contact')->with('message', '登録が完了しました');
    }

    /**
     * 連絡体制の画面キャプチャを保存
     *
     * @return void
     */
    public function capture()
    {
        $areaListId = Auth::guard()->user()->area_list_id;
        $contact = AreaImage::where('area_list_id', $areaListId)->update(['image06' => request('image')]);

        return response()->json([
            'result'    => 1
        ]);
    }
}
