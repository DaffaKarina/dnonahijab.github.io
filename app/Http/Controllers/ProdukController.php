<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{

    public function index()
    {
        $title = 'Data Produk';
        if (request()->ajax()) {
            $produk = Produk::latest();
            return DataTables::of($produk)
                ->addIndexColumn()
                ->editColumn('deskripsi', function ($row) {
                    // return $row->kategori->nama;
                    return strip_tags(Str::words($row->deskripsi, 3));
                })
                ->editColumn('kategori', function ($row) {
                    return $row->kategori->nama;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list">
                    <a target="_blank" href="' . route('detail', $row->id) . '" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i> </a>
                    <a href="' . route('produk.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil"></i> </a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#destory-modal" class="btn btn-danger btn-sm"><i class="mdi mdi-window-close"></i> </button>
                    </div>
                    <div id="destory-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Konfirmasi!</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                   Anda yakin ingin hapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                     <form action="' . route('produk.destroy', $row->id) . '" method="POST">
                                         ' . csrf_field() . '
                                        ' . method_field("DELETE") . '
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /';
                    return $btn;
                })
                ->rawColumns(['action', 'kategori'])
                ->make(true);
        }
        return view('admin.produk', compact(['title']));
    }

    public function create()
    {
        $title = "Add Produk";
        $kategori =  Kategori::all();
        return view('admin.produk-form', compact(['title', 'kategori']));
    }

    public function edit($id)
    {
        $title = "Edit Produk";
        $produk = Produk::find($id);
        $kategori =  Kategori::all();
        return view('admin.produk-form', compact(['title', 'kategori', 'produk']));
    }


    public function store($type, Request $request)
    {
        if ($type == 'images') {
            $file = $request->file('file');
            $name = 'images_' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $request->thumbnail = $name;
            // $file->move(storage_path('images'), $name);
            $file->storeAs('images', $name, 'public');

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } elseif ($type == 'produk') {
            $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'harga' => 'required|numeric',
                'kategori' => 'required|string',
            ]);

            if (empty($request->id)) {

                $produk = new Produk;
                $produk->nama = $request->nama;
                $produk->deskripsi = $request->deskripsi;
                $produk->harga = $request->harga;
                $produk->kategori_id = $request->kategori;

                $msg = 'Produk creted!';
            } else {
                $produk = Produk::find($request->id);
                $produk->nama = $request->nama;
                $produk->deskripsi = $request->deskripsi;
                $produk->harga = $request->harga;
                $produk->kategori_id = $request->kategori;
                $msg = 'Produk updated!';
            }

            DB::beginTransaction();
            try {
                $produk->save();

                foreach ($request->input('images', []) as $file) {

                    $itemImage = Image::where('name', $file)->first();

                    if (!$itemImage) {
                        // $itemImage = Image::create(
                        //     [
                        //         'name' =>  $file,
                        //         'path' => 'storage/images/' . $file,
                        //         'size' =>  Storage::disk('public')->size('images/' . $file),
                        //     ]
                        // );
                        $image =  new Image;
                        $image->name = $file;
                        $image->path = 'storage/images/' . $file;
                        $image->size =  Storage::disk('public')->size('images/' . $file);
                        $produk->images()->save($image);
                    }
                }

                DB::commit();
                return redirect()->route('produk')->with('status', $msg);
            } catch (\Exception $e) {
                DB::rollBack();

                dd($e->getMessage());
                // return redirect()->route('produk')->with('error', 'Something went wrong!');
            }
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $produk = Produk::find($id);
            $produk->delete();
            $produk->images()->delete();
            DB::commit();
            return redirect()->route('produk')->with('status', 'Produk deleted!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('produk')->with('error', 'Something went wrong!');
        }
    }

    public function imagesDestroy($name)
    {
        $image = Image::where('name', $name)->first();
        DB::beginTransaction();
        try {
            if (Storage::exists('public/images/' . $name))
                Storage::delete('public/images/' . $name);
            $image->delete();
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false]);
        }
    }
}
