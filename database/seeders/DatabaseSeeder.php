<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\UserTable;
//use Database\Seeders\SettingSeeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //php artisan db:seed
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionTableSeeder::class);
        $this->call(UserSeeder::class);
     //   $this->call(SettingSeeder::class);
    }
}