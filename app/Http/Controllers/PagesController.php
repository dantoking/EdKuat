<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $pages = DB::table('pages') ->where('deleted', 0)->get();
        $data['pages']=$pages;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pages = DB::table('pages') ->where('deleted', 0)->where('id',$id)->get();
        $data['pages']=$pages;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $pages = DB::table('pages') ->where('deleted', 0)->where('nama', 'LIKE' , '%'.$nama.'%')->get();
        $data['pages']=$pages;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pages')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('pages')->where('pages.deleted' , 0)->where('pages.id', $id )->update($request->all());
        $berhasil = DB::table('pages')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function hapus($id)
    {
        DB::update ('update pages set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update pages set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
