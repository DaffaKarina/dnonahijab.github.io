<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        \App\Models\Kategori::factory(10)->create();
        $produk = \App\Models\Produk::factory(10)->create();

        $file = new Filesystem;
        $file->cleanDirectory('storage/app/public/profile');
        $file->cleanDirectory('storage/app/public/images');

        User::All()->each(function ($user) {
            $imageName = Carbon::now()->timestamp . '.jpg';
            $path =  'storage/profile/' . $imageName;
            $contents = file_get_contents('https://picsum.photos/400/400.jpg');
            Storage::disk('public')->put('profile/' . $imageName, $contents);
            $user->image()->create([
                'name' => $imageName,
                'path' => $path,
                'size' => Storage::disk('public')->size('profile/' . $imageName),
            ]);
        });

        for ($i = 0; $i < 5; $i++) {
            // code to repeat here
            Produk::All()->each(function ($image) use ($produk) {
                $imageName = Carbon::now()->timestamp . '.jpg';
                $path =  'storage/images/' . $imageName;
                $contents = file_get_contents('https://picsum.photos/600/450.jpg');
                Storage::disk('public')->put('images/' . $imageName, $contents);
                $image->images()->create([
                    'imageable_id' => $produk->random(rand(1, 3))->pluck('id')->toArray(),
                    'name' => $imageName,
                    'path' => $path,
                    'size' => Storage::disk('public')->size('images/' . $imageName),
                ]);
            });
        }
    }
}