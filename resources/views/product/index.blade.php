@extends('layouts.app')

@section('title', 'Kelola Product')

@section('content')
    <main class="admin-page">
        <div class="container admin-container wide">
            <div class="page-heading">
                <div>
                    <span class="eyebrow">Dashboard sederhana</span>
                    <h1>Kelola Product</h1>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-secondary" href="{{ route('landing') }}">
                        Lihat Landing Page
                    </a>
                    <a class="btn" href="{{ route('product.create') }}">
                        Tambah Product
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-card">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $product->nama_product }}</strong>
                                    <small>{{ $product->deskripsi }}</small>
                                </td>
                                <td>
                                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <img src="{{ Storage::url('public/' . $product->gambar) }}" class="image">
                                </td>
                                <td class="actions">
                                    <a class="btn btn-small btn-edit" href="{{ route('product.edit', $product) }}">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('product.destroy', $product) }}"
                                        onsubmit="return confirm('Hapus product ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-small btn-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    Belum ada products.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
