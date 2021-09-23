@extends('Admin/index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $judul_1 }}</h1>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $judul_2 }}</h6>
                </div>
                <div class="card-body">

                    <form action="/Data_Produk/Edit_Produk/{{ $getProduk->id_produk }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control form-control @error('nama_produk') is-invalid @enderror" value="{{ $getProduk->nama_produk }}" placeholder="Nama Produk...">
                                <div class="invalid-feedback">@error('nama_produk')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Varian</label>
                                <input type="text" name="varian" class="form-control form-control @error('varian') is-invalid @enderror" value="{{ $getProduk->varian }}" placeholder="Varian...">
                                <div class="invalid-feedback">@error('varian')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Stok Produk</label>
                                <input type="number" name="stok_produk" class="form-control form-control @error('stok_produk') is-invalid @enderror" value="{{ $getProduk->stok_produk }}" placeholder="Stok Produk..">
                                <div class="invalid-feedback">@error('stok_produk')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Harga Satuan</label>
                                <input type="number" name="harga_satuan" class="form-control form-control @error('harga_satuan') is-invalid @enderror" value="{{ $getProduk->harga_satuan }}" placeholder="Harga Satuan...">
                                <div class="invalid-feedback">@error('harga_satuan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Dekripsi Produk</label>
                                <textarea class="form-control @error('dekripsi') is-invalid @enderror" rows="5" name="dekripsi">{{ $getProduk->dekripsi }}</textarea>
                                <div class="invalid-feedback">@error('dekripsi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group">
                                <label for="largeInput">kategori</label>
                                <input type="text" name="kategori" class="form-control form-control  @error('kategori') is-invalid @enderror" value="{{ $getProduk->kategori }}" placeholder="Kategori..">
                                <div class="invalid-feedback">@error('kategori')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Produk</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">


                        <div class="form-group">

                            <img src="{{ url('produk/'.$getProduk->foto) }}" style="width: 200px; height:200px; ">
                        </div>



                        <div class="form-group">

                            <input type="file" name="foto" value="{{ $getProduk->foto }}" class="form-control form-control @error('foto') is-invalid @enderror">
                            <div class="invalid-feedback">@error('foto')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <hr>
                        <div class="card-action">
                            <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>

                            <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
