@extends('layouts.app')

@section('title', 'Edit Product')
@section('content')
    <main class="admin-page">
        <div class="container admin-container">
            <div class="page-heading">
                <div>
                    <span class="eyebrow">Pengelolaan product</span>
                    <h1>Edit Product</h1>
                </div>
            </div>

            <form method="POST" action="{{ route('product.update', $product) }}" class="form-card" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('product._form', ['tombol' => 'Perbarui Product'])
            </form>
        </div>
    </main>
@endsection