@extends('Admin/index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
                </div>
                <div class="card-body">
                    <table cellspacing="10" cellpadding="10" align="center">
                        <thead>
                            <tr>
                                <th>Nama Produk : </th>
                                <td>{{ $detailProduk->nama_produk }}</td>
                            </tr>
                        </thead>
                        <br>
                        <thead>
                            <tr>
                                <th>Varian : </th>
                                <td>{{ $detailProduk->varian }}</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Kategori : </th>
                                <td>{{ $detailProduk->kategori }}</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Stok Produk : </th>
                                <td>{{ $detailProduk->stok_produk }}</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Harga Satuan : </th>
                                <td>{{ $detailProduk->harga_satuan }}</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Dekripsi Produk : </th>
                                <td>{{ $detailProduk->dekripsi }}</td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>
                                    <h6 class="m-0 font-weight-bold text-primary">Foto Produk</h6>
                </div>
                <div class="card-body">
                    <p>
                        <img src="{{ url('produk/'.$detailProduk->foto) }}" style="width: 300px; height:300px; ">
                    </p>



                    <hr>
                    <div class="card-action">

                        <!-- <button class="btn btn-danger">Cancel</button> -->
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-success">Kembali</a>
                    </div>






                </div>
            </div>
            </th>

            </tr>
            </thead>


            </table>



        </div>
    </div>



</div>

<div class="col-lg-6">



</div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
