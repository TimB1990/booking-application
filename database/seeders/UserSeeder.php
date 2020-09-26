<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin')
        ]);

        $role = Role::where('abbr', 'A')->first();

        // adds single roll to user
        $user->roles()->attach($role->id);

        // adding multiple roles to user
        // $roles = Role::all()->pluck('id');
        // $user->roles()->attach($roles);
        // removing role
        // $user->roles()->detach($role->id);
        // removing multiple roles
        // $user->roles()->detach($roles);
    }
}
