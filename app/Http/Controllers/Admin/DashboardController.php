<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tittle = 'Selamat Datang di Administrator Website';
        $menu = 'Dashboard';
        // $appsetting = AppSetting::first();

        return view('admin.dashboard', compact('menu', 'tittle'));
    }
}
