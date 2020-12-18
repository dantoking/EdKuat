<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LokasiController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $lokasi = DB::table('lokasi')->get();
        $data['lokasi']=$lokasi;
        return json_encode($data);
    }

    public function cari($id)
    {
        $lokasi = DB::table('lokasi')->where('id',$id)->get();
        $data['lokasi']=$lokasi;
        return json_encode($data);
    }

    public function carikabupaten($kabupaten)
    {
        $lokasi = DB::table('lokasi')->where('kabupaten', 'LIKE' , '%'.$kabupaten.'%')->get();
        $data['lokasi']=$lokasi;
        return json_encode($data);
    }

    public function cariprovinsi($provinsi)
    {
        $lokasi = DB::table('lokasi')->where('provinsi', 'LIKE' , '%'.$provinsi.'%')->get();
        $data['lokasi']=$lokasi;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('lokasi')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('lokasi')->where('lokasi.id', $id )->update($request->all());
        $berhasil = DB::table('lokasi')->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    // public function hapus($id)
    // {
    //     DB::update ('update lokasi set deleted = 1 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
    //     return json_encode($berhasil);
    // }

    // public function restore($id)
    // {
    //     DB::update ('update lokasi set deleted = 0 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
    //     return json_encode($berhasil);
    // }
}
