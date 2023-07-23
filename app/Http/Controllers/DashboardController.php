<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $produkCount = Produk::count();
        $title = 'Dashboard';
        return view('admin.dashboard', compact(['title',  'produkCount']));
    }
}