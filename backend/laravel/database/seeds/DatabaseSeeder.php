<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (is_local_env()) {
            $this->callTestSeeders();
        }
    }

    /**
     * @return void
     */
    protected function callTestSeeders(): void
    {
        $this->call([
            TestUserTableSeeder::class,
            TestTaskTemplateTableSeeder::class,
            TestTaskTableSeeder::class,
        ]);
    }
}
