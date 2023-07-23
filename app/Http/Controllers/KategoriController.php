<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Kategori';
        if (request()->ajax()) {
            $kategori = Kategori::latest();
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->editColumn('deskripsi', function ($row) {
                    return Str::limit($row->deskripsi, 10);
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list">
                    <a href="' . route('kategori.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil"></i> </a>
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
                                     <form action="' . route('kategori.destroy', $row->id) . '" method="POST">
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
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.kategori', compact('title'));
    }

    public function create()
    {
        $title = "Add Kategori";
        return view('admin.kategori-form', compact('title'));
    }

    public function edit($id)
    {
        $title = "Edit Kategori";
        $kategori = Kategori::find($id);
        return view('admin.kategori-form', compact(['title', 'kategori']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if (empty($request->id)) {
            $kategori = new Kategori;
            $kategori->nama = $request->nama;
            $kategori->deskripsi = $request->deskripsi;

            $msg = 'Kategori created!';
        } else {
            $kategori = Kategori::find($request->id);
            $kategori->nama = $request->nama;
            $kategori->deskripsi = $request->deskripsi;

            $msg = 'Kategori updated!';
        }

        DB::beginTransaction();
        try {
            $kategori->save();
            DB::commit();
            return redirect()->route('kategori')->with('status', $msg);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('kategori')->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $kategori = Kategori::find($id);
            $kategori->delete();
            DB::commit();
            return redirect()->route('kategori')->with('status', 'Kategori deleted!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('kategori')->with('error', 'Something went wrong!');
        }
    }
}
