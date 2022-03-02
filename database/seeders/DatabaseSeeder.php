<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //    \App\Models\User::factory(10)->create();
         User::create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => \Hash::make('password'),
         ]);
         
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
