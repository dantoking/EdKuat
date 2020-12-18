<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PaketController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $paket = DB::table('paket') ->where('deleted', 0)->get();
        $data['paket']=$paket;
        return json_encode($data);
    }

    public function cari($id)
    {
        $paket = DB::table('paket') ->where('deleted', 0)->where('id',$id)->get();
        $data['paket']=$paket;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $paket = DB::table('paket') ->where('deleted', 0)->where('nama', 'LIKE' , '%'.$nama.'%')->get();
        $data['paket']=$paket;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('paket') ->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('paket')->where('paket.deleted' , 0)->where('paket.id', $id )->update($request->all());
        $berhasil = DB::table('paket')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function hapus($id)
    {
        DB::update ('update paket set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update paket set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
