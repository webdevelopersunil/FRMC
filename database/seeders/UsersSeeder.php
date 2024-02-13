<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name'      => 'User',
                'email'     => 'user@gmail.com',
                'password'  =>  Hash::make('user@123'),
                'username'  => 'user',
                // 'cpfNo'     => 'A004629',
                'address'   => 'Address of the nodel officer',
                'phone'     => '1212121214',
            ]
        )->assignRole('user');
        
        User::create(
            [
                'name'      => 'Nodal Officer',
                'email'     => 'nodal@gmail.com',
                'password'  =>  Hash::make('nodal@123'),
                'username'  => 'nodal_officer',
                'cpfNo'     => 'A004628',
                'address'   => 'Address of the nodel officer',
                'phone'     => '1212121212',
            ]
        )->assignRole('nodal');

        User::create(
            [
                'name'      => 'FCO Officer',
                'email'     => 'fco@gmail.com',
                'password'  =>  Hash::make('Welcome@123'),
                'username'  => 'fco_officer',
                'cpfNo'     => 'A004629',
                'address'   => 'Address of the nodel officer',
                'phone'     => '1212121213',
            ]
        )->assignRole('fco');
        
    }
}
