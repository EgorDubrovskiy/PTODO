<?php

use App\User;

/**
 * Class TestUserTableSeeder
 */
class TestUserTableSeeder extends TestSeeder
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

        $this->getFactoryBuilder(User::class, $amountSimpleUsers)->create();
        $this->createByCustomState(User::class, ['deleted_at'], $amountDeletedUsers);
    }
}
