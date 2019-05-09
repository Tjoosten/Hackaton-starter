<?php

use App\User;
use Spatie\Seeders\Faker;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    const ADMIN = 'admin'; 
    const USER  = 'user';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        collect($this->organisationMembers())->each(function (array $name): void {
            [$firstName, $lastName] = $name;

            $data = ['firstname' => $name[0], 'lastname' => $name[1], 'email' => strtolower($name[0]) . '@domain.tld', 'password' => 'password'];
            $user = $this->createBackUser($data);

            if ($this->isInAdminArray($user->email)) {
                $user->assignRole(self::ADMIN);
            }
            
            $user->assignRole(self::USER);
        });

        // Output message
        $this->command->info('Here are your admin details to login as admin:'); 
        $this->command->warn('admin@domain.tld'); 
        $this->command->warn('Password is "password"');
    }

     /**
     * Determine if the given address is an webmaster in the application.
     *
     * @return bool
     */
    protected function isInAdminArray(string $email): bool
    {
        return in_array($email, $this->organisationAdmins());
    }

    /**
     * The array of email addresses that are webmasters in the application.
     *
     * @return array
     */
    protected function organisationAdmins(): array
    {
        return ['admin@domain.tld'];
    }
    /**
     * Get the list of the members in the non profit organisation.
     * This list is also used in the creation of the basic logins
     * for the application barebone.
     *
     * @return array
     */
    protected function organisationMembers(): array
    {
        return [['admin', 'user'], ['normal', 'user']];
    }
    /**
     * Method for creating the actual logins.
     *
     * @param  array $attributes
     * @return User
     */
    protected function createBackUser(array $attributes = []): User
    {
        $person = app(Faker::class)->person();
        
        return User::create($attributes + [
            'firstname' => $person['firstName'],
            'lastname' => $person['lastName'],
            'email' => $person['email'],
            'email_verified_at' => now(),
            'password' => faker()->password,
        ]);
    }
}