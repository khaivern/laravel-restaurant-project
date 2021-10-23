<?php

namespace Database\Seeders;

use App\Models\Chef;
use App\Models\FoodMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('food_menus')->truncate();
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        FoodMenu::factory(20)->create();
        Chef::factory(5)->create();
    }
}
