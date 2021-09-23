<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    public function allData()
    {

        return DB::table('tbl_produk')->get();
    }
    public function resultData()
    {

        return DB::table('tbl_produk')->count();
    }


    public function detailProduk($id_produk)
    {

        return DB::table('tbl_produk')->where('id_produk', $id_produk)->first();
    }

    public function insertDataProduk($data)
    {

        return DB::table('tbl_produk')->insert($data);
    }

    public function editDataProduk($id_produk, $data)
    {

        return DB::table('tbl_produk')->where('id_produk', $id_produk)->update($data);
    }

    public function deleteDataProduk($id_produk)
    {
        DB::table('tbl_produk')->where('id_produk', $id_produk)->delete();
    }
}
