<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* Users table */
        $usersData = array(
            array(
                "username" => "annchemu", "password" => Hash::make("password"), "email" => "admin@hstrathmore.org",
                "name" => "Ann Chemu", "gender" => "1", "phone"=>"0722000000", "address" => "P.O. Box 59857-00200, Nairobi"
            )
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('Users table seeded');
    }
}
