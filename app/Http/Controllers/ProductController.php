<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function landing(): View
    {
        $products = Product::query()->latest()->get();

        return view('landing', compact('products'));
    }

    public function index(): View
    {
        $products = Product::query()->latest()->get();

        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'nama_product' => ['required', 'string', 'max:100'],
                'deskripsi' => ['required', 'string'],
                'harga' => ['required', 'integer', 'min:0'],
                'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ],
            self::validationMessages()
        );

        $path = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $filename = now()->timestamp . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('gambar', $filename, 'public');
        }

        $validated['gambar'] = $path;

        Product::query()->create($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'product berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('product.edit', compact('product'));
    }

    public function update(
        Request $request,
        Product $product
    ): RedirectResponse {
        $validated = $request->validate(
            [
                'nama_product' => ['required', 'string', 'max:100'],
                'deskripsi' => ['required', 'string'],
                'harga' => ['required', 'integer', 'min:0'],
                'gambar' => ['nullable', 'image', 'mimes:png,jpeg,jpg,gif', 'max:2048'],
            ],
            $this->validationMessages()

        );

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $filename = now()->timestamp . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('gambar', $filename, 'public');
            $validated['gambar'] = $path;
        }


        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'product berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'product berhasil dihapus.');
    }

    private function validationMessages(): array
    {
        return [
            'nama_product.required' => 'Nama product wajib diisi.',
            'nama_product.max' => 'Nama maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.integer' => 'Harga harus berupa bilangan bulat.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'gambar.required' => 'Wajib memasukkan gambar',
            'gambar.max' => 'Ukuran gambar maksimal 2mb.',
            'gambar.image' => 'file harus berupa gambar',
            'gambar.mimes' => 'format file harus berupa jpeg, png, jpg atau gif'
        ];
    }
}
