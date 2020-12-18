<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $kategoris = DB::table('kategori') ->where('deleted', 0)->get();
        $data['kategoris']=$kategoris;
        return json_encode($data);
    }

    public function cari($id)
    {
        $kategoris = DB::table('kategori') ->where('deleted', 0)->where('id',$id)->get();
        $data['kategoris']=$kategoris;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $kategoris = DB::table('kategori') ->where('deleted', 0)->where('nama', 'LIKE' , '%'.$nama.'%')->get();
        $data['kategoris']=$kategoris;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('kategori') ->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('kategori')->where('kategori.deleted' , 0)->where('kategori.id', $id )->update($request->all());
        $berhasil = DB::table('kategori')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function hapus($id)
    {
        DB::update ('update kategori set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update kategori set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }

}
