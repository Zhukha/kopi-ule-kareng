@extends('layouts.app')

@section('title', 'Tambah Product')

@section('content')
    <main class="admin-page">
        <div class="container admin-container">
            <div class="page-heading">
                <div>
                    <span class="eyebrow">Pengelolaan product</span>
                    <h1>Tambah Product</h1>
                </div>
            </div>

            <form method="POST" action="{{ route('product.store') }}" class="form-card" enctype="multipart/form-data">
                @csrf
                @include('product._form', ['tombol' => 'Simpan Product'])
            </form>
        </div>
    </main>
@endsection