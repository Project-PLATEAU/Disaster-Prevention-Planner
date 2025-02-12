<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $role = Auth::guard()->user()->role;

        if ($role === 'member') {
            return redirect()->route('resident.index.index');
        } elseif ($role === 'org') {
            return redirect()->route('org.index.index');
        } elseif ($role === 'gov') {
            return redirect()->route('gov.index.index');
        }
    }
}
