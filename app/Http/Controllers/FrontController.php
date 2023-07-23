<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $kategoriFr = Kategori::limit(3)->orderBy('created_at', 'DESC')->get();
        $produk = Produk::limit(3)->orderBy('created_at', 'DESC')->get();
        return view('front.home', compact(['title', 'produk', 'kategoriFr']));
    }

    public function detail($id)
    {

        $produk =  Produk::find($id);
        $terkait =  Produk::where('kategori_id', $produk->kategori_id)->get();
        $image = Image::where('imageable_id', $id)->where('imageable_type', 'App\Models\Produk')->first();
        $title = 'Detail Produk';
        return view('front.detail', compact(['title', 'produk', 'image', 'terkait']));
    }

    public function shop()
    {
        $produk =  Produk::latest()->filter(request(['search', 'kategori']))->paginate(6)->withQueryString();
        $title = 'Shop';
        // dd($produk);
        return view('front.shop', compact(['title', 'produk']));
    }

    public function about()
    {
        $title = 'About';
        return view('front.about', compact('title'));
    }
}
