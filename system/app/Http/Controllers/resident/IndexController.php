<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index()
    {
        return view('resident.index.index');
    }

    /**
     * サインアップ後のトップページ
     *
     * @return void
     */
    public function initial()
    {
        return view('resident.index.initial');
    }
}
