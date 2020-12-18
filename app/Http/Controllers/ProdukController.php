<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all()
    {
        $produks = DB::table('produk') ->where('deleted', 0)->get();
        $data['produks']=$produks;
        return json_encode($data);
    }

    public function index()
    {
        $produk = DB::table('produk', 'kategori')->select('produk.id as id','produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->get();
        $data['produk']=$produk;
        return json_encode($data);
    }

    public function cari($id)
    {
        $produk = DB::table('produk', 'kategori')->select('produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->where('produk.id',$id)->get();
        $data['produk']=$produk;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $produk = DB::table('produk', 'kategori')->select('produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->where('produk.nama', 'LIKE' , '%'.$nama.'%')->get();
        $data['produk']=$produk;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('produk')->insert($request->all());
        $berhasil = ['berhasil menambah produk' ];
        return json_encode($berhasil);
        // DB::table('produk')->insert(array(
        //     'nama' => $nama,
        //     'kode' => $kode,
        //     'unit' => $unit,
        //     'harga_dasar' => $harga_dasar,
        //     'harga_jual' => $harga_jual,
        //     'keterangan' => $keterangan,
        //     'berat' => $berat,
        //     'status_olshop' => $status_olshop,
        //     'status_penjualan' => $status_penjualan,
        //     'status_pembelian' => $status_pembelian,
        //     'kategori_id' => $kategori_id,
        //     'total_stock' => $total_stock
        // ));
        // $berhasil = ['Berhasil Menambahkan', $nama, $kode, $unit, $harga_dasar, $harga_jual, $keterangan, $berat, $status_olshop, $status_penjualan, $status_pembelian, $kategori_id, $total_stock];
        // return json_encode($berhasil);
    }

    public function ubah(Request $request ,$id)
    {
        DB::table('produk')->where('produk.deleted' , 0)->where('produk.id', $id )->update($request->all());
        $berhasil = DB::table('produk')->where('deleted' , 0)->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
        // DB::table('produk')->where('id', $id)->update(array(
        //     'nama' => $nama,
        //     'kode' => $kode,
        //     'unit' => $unit,
        //     'harga_dasar' => $harga_dasar,
        //     'harga_jual' => $harga_jual,
        //     'keterangan' => $keterangan,
        //     'berat' => $berat,
        //     'status_olshop' => $status_olshop,
        //     'status_penjualan' => $status_penjualan,
        //     'status_pembelian' => $status_pembelian,
        //     'kategori_id' => $kategori_id,
        //     'total_stock' => $total_stock
        // ));
        // $berhasil = ['berhasil mengubah produk dengan id = ' , $id , 'menjadi' , $nama ];
        // return json_encode($berhasil);
    }

    public function hapus($id)
    {
        DB::table('produk')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus data produk dengan id :' .$id];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::table('produk')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data produk yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
    }
}
