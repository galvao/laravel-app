<?php

namespace Database\Seeders;

use Illuminate\{
    Database\Console\Seeds\WithoutModelEvents,
    Database\Seeder,
    Support\Facades\DB,
    Support\Str
};

use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'label' => Str::random(20),
        ]);

        DB::table('items')->insert([
            'label' => Str::random(20),
        ]);
    }
}
