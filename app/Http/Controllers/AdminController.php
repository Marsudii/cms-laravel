<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;


class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

        $this->ProdukModel = new ProdukModel();
    }


    // -------------------------------------------------------------------Dashboard Controller-------------------------------------------------------------------------------------------------------


    public function Dashboard()
    {


        $data = [
            'title' => "Dashboard | Admin",
            'judul' => 'Dashboard Cemilan Wara Wiri',
            'produk' => $this->ProdukModel->resultData(),

        ];

        return view('/Admin/content/home', $data);
    }


    // -------------------------------------------------------------------Data Produk Controller-------------------------------------------------------------------------------------------------------
    //view Data Produk
    public function dataProduk()
    {
        $data = [
            'produk' => $this->ProdukModel->allData(),
        ];

        $data1 = [
            'title' => "Data Produk | Admin",
            'judul' => 'Data Produk',
        ];
        return view('/Admin/content/produk', $data1, $data);
    }

    //view Detail Produk

    public function detailProduk($id_produk)
    {
        if (!$this->ProdukModel->detailProduk($id_produk)) {
            abort(404);
        }
        $data = [
            'detailProduk' => $this->ProdukModel->detailProduk($id_produk),
        ];
        $data1 = [
            'title' => "Data Produk | Admin",
            'judul' => 'Data Produk',
        ];

        return view('/Admin/content/detailProduk', $data1, $data);
    }

    //get Data Produk View insert
    public function addDataProduk()
    {



        $data = [
            'title' => "Tambah Data Produk | Admin",
            'judul_1' => 'Tambah Data Produk',
            'judul_2' => 'Tambah Data Produk',
        ];

        return view('/Admin/content/addProduk', $data);
    }
    // Process insert data and rules validation
    public function insertDataProduk()
    {
        Request()->validate(
            [

                'nama_produk'           => 'required|max:50|min:3|unique:tbl_produk',
                'varian'                => 'required|max:50|min:3',
                'stok_produk'           => 'required|max:10000|numeric',
                'harga_satuan'          => 'required|numeric',
                'dekripsi'              => 'required|max:1000',
                'kategori'              => 'required|max:100',
                'foto'                  => 'required|mimes:jpg,jpeg,bmp,png',
            ],
            //pesan erorr
            [

                'nama_produk.required'  => 'Wajid diisi tidak boleh kosong !!!',
                'nama_produk.max'       => 'Nama Produk Maximal 50 Huruf',
                'nama_produk.min'       => 'Nama Produk Minimal 3 Huruf',

                'varian.required'       => 'Varian Harus diisi tidak boleh kosong !!!',
                'varian.max'            => 'Varian maximal 100 huruf',

                'stok_produk.required'  => 'Stok Produk Wajib diisi !!!!',
                'stok_produk.numeric'   => 'Wajib Angka Tidak Boleh Huruf',
                'stok_produk.max'       => 'Maximal stok 10000',

                'harga_satuan.required' => 'Harga Satuan Wajib diisi !!!!',
                'harga_satuan.numeric'  => 'Wajib Angka Tidak Boleh Huruf',

                'dekripsi.required'     => 'Dekripsi Wajib diisi !!!!',
                'dekripsi.max'          => 'Dekripsi Tidak boleh 1000 huruf',

                'kategori.required'     => 'Kategori Wajib diisi !!!!',
                'kategori,max'          => 'Kategori Maximal 100 Huruf',

                'foto.required'         => 'Foto Wajib diisi !!!!',
                'foto.mimes'            => 'Foto Harus format JPG, PNG, JPEG, BMP',

            ]
        );

        $file = Request()->foto;
        $fileName = Request()->nama_produk . '.' . $file->extension();
        $file->move(public_path('produk'), $fileName);


        $data = [
            'nama_produk'   => Request()->nama_produk,
            'varian'        => Request()->varian,
            'stok_produk'   => Request()->stok_produk,
            'harga_satuan'  => Request()->harga_satuan,
            'dekripsi'      => Request()->dekripsi,
            'kategori'      => Request()->kategori,
            'foto'          => $fileName,
        ];
        $this->ProdukModel->insertDataProduk($data);
        return redirect()->route('produk')->with('pesan', 'Data Berhasil Ditambahkan');
    }


    // -------------------------------------------------------------------EDIT Data Produk Controller-------------------------------------------------------------------------------------------------------
    public function editDataProduk($id_produk)
    {

        if (!$this->ProdukModel->detailProduk($id_produk)) {
            abort(404);
        }

        $data = [
            'title' => "Edit Data Produk | Admin",
            'judul_1' => 'Edit Data Produk',
            'judul_2' => 'Edit Data Produk',
            'getProduk' => $this->ProdukModel->detailProduk($id_produk),
        ];

        return view('/Admin/content/editProduk', $data);
    }
    // Process edit data and rules validation
    public function editProsesProduk($id_produk)
    {
        Request()->validate(
            [

                'nama_produk'           => 'required|max:50|min:3',
                'varian'                => 'required|max:50|min:3',
                'stok_produk'           => 'required|max:10000|numeric',
                'harga_satuan'          => 'required|numeric',
                'dekripsi'              => 'required|max:1000',
                'kategori'              => 'required|max:100',
                'foto'                  => 'mimes:jpg,jpeg,bmp,png',
            ],
            //pesan erorr
            [

                'nama_produk.required'  => 'Wajid diisi tidak boleh kosong !!!',
                'nama_produk.max'       => 'Nama Produk Maximal 50 Huruf',
                'nama_produk.min'       => 'Nama Produk Minimal 3 Huruf',

                'varian.required'       => 'Varian Harus diisi tidak boleh kosong !!!',
                'varian.max'            => 'Varian maximal 100 huruf',

                'stok_produk.required'  => 'Stok Produk Wajib diisi !!!!',
                'stok_produk.numeric'   => 'Wajib Angka Tidak Boleh Huruf',
                'stok_produk.max'       => 'Maximal stok 10000',

                'harga_satuan.required' => 'Harga Satuan Wajib diisi !!!!',
                'harga_satuan.numeric'  => 'Wajib Angka Tidak Boleh Huruf',

                'dekripsi.required'     => 'Dekripsi Wajib diisi !!!!',
                'dekripsi.max'          => 'Dekripsi Tidak boleh 1000 huruf',

                'kategori.required'     => 'Kategori Wajib diisi !!!!',
                'kategori,max'          => 'Kategori Maximal 100 Huruf',




            ]
        );

        if (Request()->foto <> "") {
            //jika ingin ganti foto
            $file = Request()->foto;
            $fileName = Request()->nama_produk . '.' . $file->extension();
            $file->move(public_path('produk'), $fileName);


            $data = [
                'nama_produk'   => Request()->nama_produk,
                'varian'        => Request()->varian,
                'stok_produk'   => Request()->stok_produk,
                'harga_satuan'  => Request()->harga_satuan,
                'dekripsi'      => Request()->dekripsi,
                'kategori'      => Request()->kategori,
                'foto'          => $fileName,
            ];
            $this->ProdukModel->editDataProduk($id_produk, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'nama_produk'   => Request()->nama_produk,
                'varian'        => Request()->varian,
                'stok_produk'   => Request()->stok_produk,
                'harga_satuan'  => Request()->harga_satuan,
                'dekripsi'      => Request()->dekripsi,
                'kategori'      => Request()->kategori,

            ];
            $this->ProdukModel->editDataProduk($id_produk, $data);
        }


        return redirect()->route('produk')->with('pesan', 'Data Berhasil Diubah');
    }


    public function deleteDataProduk($id_produk)
    {



        $produk = $this->ProdukModel->detailProduk($id_produk);
        if ($produk->foto <> "") {
            unlink(public_path('produk') . '/' . $produk->foto);
        }

        $this->ProdukModel->deleteDataProduk($id_produk);

        return redirect()->route('produk')->with('pesan', 'Data Berhasil Dihapus !!!!');
    }






    public function dataReseller()
    {

        $data = [
            'title' => "Data Reseller | Admin",
            'judul' => 'Data Reseller',
        ];

        return view('/Admin/content/reseller', $data);
    }
}
