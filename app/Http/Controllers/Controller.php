<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{

    public function __construct()
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        View::share(compact(['kategori']));
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
