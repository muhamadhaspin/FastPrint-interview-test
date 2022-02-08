@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
            </div>
            <form action="{{ route('products.update', $product->id_produk) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" placeholder="Masukkan Nama Produk"
                               class="form-control @error('nama_produk') is-invalid @enderror"
                               value="{{ old('nama_produk', $product->nama_produk) }}">
                        @error('nama_produk')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label>Kategori</label>
                                <input type="text" name="kategori" placeholder="Masukkan Kategori Produk"
                                       class="form-control @error('kategori') is-invalid @enderror"
                                       value="{{ old('kategori', $product->kategori) }}">
                                @error('kategori')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Harga</label>
                                <input type="number" name="harga" placeholder="Masukkan Harga Produk"
                                       class="form-control @error('harga') is-invalid @enderror"
                                       value="{{ old('harga', $product->harga) }}">
                                @error('harga')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Status</label>
                                <input type="text" name="status" placeholder="Masukkan Status Produk"
                                       class="form-control @error('status') is-invalid @enderror"
                                       value="{{ old('status', $product->status) }}">
                                @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-danger px-4">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
