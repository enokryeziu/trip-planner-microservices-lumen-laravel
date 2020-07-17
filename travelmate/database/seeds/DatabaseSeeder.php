<?php


use app\User;
use Illuminate\Database\Seeder;
use database\seeds\UserTableSeeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UserTableSeeder::class');
    }
}
