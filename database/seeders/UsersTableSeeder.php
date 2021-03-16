<?php

namespace Database\Seeders;

use Illuminate\Support\Collection;
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
        $this->getUsers()->each(function ($user) {
            User::updateOrCreate([
                'id' => $user['id']
            ], $user);
        });
    }

    /**
     * Gets a list of predefined users
     *
     * @return Collection
     */
    private function getUsers(): Collection
    {
        return collect([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin')
            ]
        ]);
    }
}
