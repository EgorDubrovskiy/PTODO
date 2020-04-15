<?php

use Illuminate\Database\Seeder;
use App\User;

/**
 * Class TestUserTableSeeder
 */
class TestUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amountSimpleUsers = (int) config('database.seeders.test.user.amount_simple_users');
        $amountDeletedUsers = (int) config('database.seeders.test.user.amount_deleted_users');

        factory(User::class, $amountSimpleUsers)->create();
        factory(User::class, $amountDeletedUsers)->state('deleted')->create();
    }
}
