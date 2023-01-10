<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameRole = [
            'admin',
            'coach',
            'manager',
            'member',
            
        ];

        foreach ($nameRole as  $value) {
            Role::create(['name' => $value]);
        }

        $users = [
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'admin@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999), 
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Huy Hoàng',
                'email' => 'manager@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Quân',
                'email' => 'coach@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Mạnh Quân',
                'email' => 'member@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Tiến Hoàng',
                'email' => 'coach2@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Quang Huy',
                'email' => 'coach3@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Mai Văn Minh',
                'email' => 'coach4@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Đõ Minh Mạnh',
                'email' => 'coach5@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Mai Anh Tài',
                'email' => 'coach6@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn C',
                'email' => 'member1@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Trường',
                'email' => 'member2@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Khải',
                'email' => 'member3@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Long',
                'email' => 'member4@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Huy',
                'email' => 'member5@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            [
                'name' => 'Nguyễn Văn Hùng',
                'email' => 'member6@example.com',
                'password' => '$2a$12$onNtXT7kF7Iw4LA7nw8kFOBfMMl8kMC4qxb850m6Vg6e9ZNrfnVw2',
                'gender' => 'nam',
                'phone' => rand(1000000000,9999999999),
                'avatar' => fake()->imageUrl(),
                'wage'=>200000,
                'email_verified_at' => '2022-09-08 15:00:14',
                'address' => 'Hà nội',
                'status' => 1
            ],
            
        ];

        foreach ($users as $key => $user) {
            $user = User::create($user);
            $email = $user['email'];
            switch ($email) {
                case 'admin@example.com':
                    $userSetRole = User::where('email', 'admin@example.com')->first();
                    $userSetRole->assignRole('admin');
                    break;
                case 'manager@example.com':
                    $userSetRole = User::where('email', 'manager@example.com')->first();
                    $userSetRole->assignRole('manager');
                    break;
                case 'coach@example.com':
                    $userSetRole = User::where('email', 'coach@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;
                case 'coach2@example.com':
                    $userSetRole = User::where('email', 'coach2@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;
                case 'coach3@example.com':
                    $userSetRole = User::where('email', 'coach3@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;
                case 'coach4@example.com':
                    $userSetRole = User::where('email', 'coach4@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;
                case 'coach5@example.com':
                    $userSetRole = User::where('email', 'coach5@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;
                case 'coach6@example.com':
                    $userSetRole = User::where('email', 'coach6@example.com')->first();
                    $userSetRole->assignRole('coach');
                    break;  
                case 'member@example.com':
                    $userSetRole = User::where('email', 'member@example.com')->first();
                    $userSetRole->assignRole('member');
                    break;
            }
        }

        // User::factory(10)->create();

        $members = User::all();
        foreach ($members as $key => $member) {
            if(!in_array($member->email, ['admin@example.com', 'manager@example.com','coach@example.com','coach2@example.com', 'coach3@example.com', 'coach5@example.com', 'coach6@example.com','member@example.com'])){
                $member->assignRole('member');
            }
        }
    }
}
