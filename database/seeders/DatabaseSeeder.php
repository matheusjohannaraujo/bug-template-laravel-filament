<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@filamentphp.com',
            'password' => Hash::make('password')
        ]);

        $coleta = new \App\Models\Coleta();
        $coleta->name = 'Test';
        $coleta->geo = \Illuminate\Support\Facades\DB::raw('POINT(46.646748, 24.562727)');
        $coleta->save();
    }
}
