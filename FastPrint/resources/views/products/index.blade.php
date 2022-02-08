@extends('layouts.app')

@section('content')

@if (session()->has('success'))
<div class="alert alert-info" role="alert">
    {{ session('success') }}
</div>
@endif
<h1 class="display-6 text-center">Fast Print Produk</h1>

<div class="row justify-content-center mb-2">
    <div class="col"><a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a></div>
</div>

<div class="row justify-content-center">
    <div class="col-12">
        <table class="table table-dark table-striped table-hover align-middle text-center">
            <thead class="w-100">
                <tr>
                    <th style="width: 50px">#</th>
                    <th>Nama Produk</th>
                    <th style="width: 200px">kategori</th>
                    <th style="width: 100px">Harga</th>
                    <th style="width: 100px">Status</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <th>{{ $products->firstItem() + $loop->index }}</th>
                    <td class="text-start">{{ $product->nama_produk }}</td>
                    <td>{{ $product->kategori }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id_produk) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('products.destroy', $product->id_produk) }}" method="post"
                              class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="6" class="text-center display-6">Tidak Ada Produk Tersedia</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col">
        {!! $products->links() !!}
    </div>
</div>
@endsection
