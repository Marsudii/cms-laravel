@extends('Admin/index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <!-- Page Heading -->

            <h1 class="h3 mb-0 text-gray-800">{{ $judul }}</h1>
            <br>
            <a href="/Data_Produk/Tambah_Produk" class=" btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-add fa-sm text-white-50"></i> Tambah Data Produk</a>
            @if (session('pesan'))
            <div class="alert alert-success">
                <a href="#" class="alert-link">{{ session('pesan') }}</a>.
            </div>

            @endif




        </div>

        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Varian</th>
                            <th>Stok Produk</th>
                            <th>Harga Satuan</th>
                            <th>Kategori</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produk as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->varian }}</td>
                            <td>{{ $item->stok_produk }}</td>
                            <td>{{ $item->harga_satuan }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <a href="/Data_Produk/Detail/{{ $item->id_produk }}" class="btn btn-success btn-circle">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="/Data_Produk/Edit_Produk/{{ $item->id_produk }}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete{{ $item->id_produk }}">
                                    <i class="fas fa-trash"></i>
                                </button>


                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

                @foreach ($produk as $data)


                <!-- Modal -->
                <div class="modal fade" id="delete{{ $data->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Ingin Menghapus produk {{ $data->nama_produk }} ?
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="/Data_Produk/Delete_Produk/{{ $data->id_produk }}" class="btn btn-primary">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




@endsection
