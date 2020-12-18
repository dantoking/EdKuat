<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $karyawan = DB::table('karyawan') ->where('deleted', 0)->get();
        $data['karyawan']=$karyawan;
        return json_encode($data);
    }

    public function cari($id)
    {
        $karyawan = DB::table('karyawan') ->where('deleted', 0)->where('id',$id)->get();
        $data['karyawan']=$karyawan;
        return json_encode($data);
    }

    public function carinama($nama_lengkap)
    {
        $karyawan = DB::table('karyawan') ->where('deleted', 0)->where('nama_lengkap', 'LIKE' , '%'.$nama_lengkap.'%')->get();
        $data['karyawan']=$karyawan;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('karyawan') ->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('karyawan')->where('karyawan.deleted' , 0)->where('karyawan.id', $id )->update($request->all());
        $berhasil = DB::table('karyawan')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function hapus($id)
    {
        DB::update ('update karyawan set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update karyawan set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }

}
