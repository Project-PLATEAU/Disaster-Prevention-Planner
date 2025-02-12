<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;

/**
 * トップページ
 */
class IndexController extends Controller
{
    /**
     * トップページ
     *
     * @return void
     */
    public function index() {
        return view('org.index.index');
    }
}
