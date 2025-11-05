@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-list-ul"></i> Daftar Produk</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Produk
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Nama Produk</th>
                                <th width="30%">Deskripsi</th>
                                <th width="15%">Harga</th>
                                <th width="10%">Stok</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><strong>{{ $product->nama }}</strong></td>
                                <td>{{ Str::limit($product->deskripsi, 60, '...') }}</td>
                                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $product->stok }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                    <p class="mt-2 text-muted">Belum ada data produk</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-circle"></i> Tambah Produk Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection