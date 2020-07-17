// app/database/seeds/UserTableSeeder.php

<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create();
    }
}