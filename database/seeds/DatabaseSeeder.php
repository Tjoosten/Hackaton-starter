<?php

use Spatie\Seeders\DatabaseSeeder as Seeder;

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
    public function run(): void
    {
        parent::run();

        // Run additional database seeder. 
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
