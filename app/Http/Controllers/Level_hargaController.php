<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Level_hargaController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all()
    {
        $level_harga = DB::table('level_harga') ->where('deleted', 0)->get();
        $data['level_harga']=$level_harga;
        return json_encode($data);
    }

    public function index()
    {
        $level_harga = DB::table('level_harga')->select('produk.nama as nama_produk','level_harga.level as level','level_harga.harga as harga')->from('level_harga')->join('produk', 'produk.id','level_harga.produk_id')->where('level_harga.deleted', 0)->get();
        $data['level_harga']=$level_harga;
        return json_encode($data);
    }

    public function cari($id)
    {
        $level_harga = DB::table('level_harga')->select('produk.nama as nama_produk','level_harga.level as level','level_harga.harga as harga')->from('level_harga')->join('produk', 'produk.id','level_harga.produk_id')->where('level_harga.deleted', 0)->where('level_harga.id',$id)->get();
        $data['level_harga']=$level_harga;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('level_harga')->insert($request->all());
        $berhasil = ['berhasil menambahkan' ];
        return json_encode($berhasil);

    }

    public function ubah(Request $request ,$id)
    {
        DB::table('level_harga')->where('level_harga.deleted' , 0)->where('level_harga.id', $id )->update($request->all());
        $berhasil = DB::table('level_harga')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);

    }

    public function hapus($id)
    {
        DB::table('level_harga')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus data level_harga dengan id :' .$id];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::table('level_harga')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data level_harga yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
    }
}
