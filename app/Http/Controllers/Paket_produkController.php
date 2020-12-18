<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Paket_produkController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all()
    {
        $paket_produk = DB::table('paket_produk') ->where('deleted', 0)->get();
        $data['paket_produk']=$paket_produk;
        return json_encode($data);
    }

    public function index()
    {
        $paket_produk = DB::table('paket_produk')->select('produk.nama as produk_id','paket.nama as paket_id', 'paket_produk.stock_produk as stock')->from('paket_produk')->join('paket', 'paket.id','paket_produk.paket_id')->join('produk','produk.id','paket_produk.paket_id')->where('paket_produk.deleted', 0)->get();
        $data['paket_produk']=$paket_produk;
        return json_encode($data);
    }

    public function cari($id)
    {
        $paket_produk = DB::table('paket_produk')->select('produk.nama as produk_id','paket.nama as paket_id', 'paket_produk.stock_produk as stock')->from('paket_produk')->join('paket', 'paket.id','paket_produk.paket_id')->join('produk','produk.id','paket_produk.paket_id')->where('paket_produk.deleted', 0)->where('paket_produk.id',$id)->get();
        $data['paket_produk']=$paket_produk;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('paket_produk')->insert($request->all());
        $berhasil = ['berhasil menambah'];
        return json_encode($berhasil);

    }

    public function ubah(Request $request ,$id)
    {
        DB::table('paket_produk')->where('paket_produk.deleted' , 0)->where('paket_produk.id', $id )->update($request->all());
        $berhasil = DB::table('paket_produk')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);

    }

    public function hapus($id)
    {
        DB::table('paket_produk')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus data paket_produk dengan id :' .$id];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::table('paket_produk')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data paket_produk yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
    }
}
