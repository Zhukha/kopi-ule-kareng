<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'nama_product' => 'Kopi Ulee Kareng Original',
                'deskripsi' => 'Kopi khas Aceh dengan aroma kuat.',
                'harga' => 25000,
                'gambar' => 'kopi-original.png',
            ],
            [
                'nama_product' => 'Kopi Sanger',
                'deskripsi' => 'Perpaduan kopi dan susu yang lembut.',
                'harga' => 18000,
                'gambar' => 'kopi-sanger.png',
            ],
            [
                'nama_product' => 'Kopi Tubruk Aceh',
                'deskripsi' => 'Sajian tradisional dengan rasa pekat.',
                'harga' => 15000,
                'gambar' => 'kopi-tubruk.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
