<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\LeaveBalance;
use App\Models\LeaveRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // manager user - use firstOrCreate to handle existing
        $manager = User::firstOrCreate(
            ['email' => 'lehlohonolo@manager.com'],
            [
                'name' => 'Lehlohonolo',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ]
        );

        // Test login user
        $testUser = User::firstOrCreate(
            ['email' => '1@1.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('12345678'),
                'role' => 'employee',
            ]
        );

        // Additional employee
        $john = User::firstOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]
        );

        $sarah = User::firstOrCreate(
            ['email' => 'sarah@example.com'],
            [
                'name' => 'Sarah Smith',
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]
        );

        // Seed leave balances for all users with default values
        // Use updateOrCreate to handle existing users
        $employees = [$manager, $testUser, $john, $sarah];
        $defaultBalances = [
            'Annual Leave' => 15,
            'Sick Leave' => 22,
            'Family Responsibility' => 3,
        ];

        foreach ($employees as $employee) {
            foreach ($defaultBalances as $type => $days) {
                LeaveBalance::updateOrCreate(
                    [
                        'user_id' => $employee->id,
                        'leave_type' => $type,
                    ],
                    [
                        'days_remaining' => $days,
                    ]
                );
            }
        }

        // Seed leave requests
        $requests = [
            [
                'user_id' => $testUser->id,
                'name' => 'Test',
                'surname' => 'User',
                'id_number' => '9001015001087',
                'leave_type' => 'Annual Leave',
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->subDays(5),
                'status' => 'approved',
            ],
            [
                'user_id' => $testUser->id,
                'name' => 'Test',
                'surname' => 'User',
                'id_number' => '9001015001087',
                'leave_type' => 'Sick Leave',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
            ],
            [
                'user_id' => $john->id,
                'name' => 'John',
                'surname' => 'Doe',
                'id_number' => '8502026002088',
                'leave_type' => 'Annual Leave',
                'start_date' => Carbon::now()->subDays(20),
                'end_date' => Carbon::now()->subDays(15),
                'status' => 'approved',
            ],
            [
                'user_id' => $john->id,
                'name' => 'John',
                'surname' => 'Doe',
                'id_number' => '8502026002088',
                'leave_type' => 'Sick Leave',
                'start_date' => Carbon::now()->addDays(1),
                'end_date' => Carbon::now()->addDays(3),
                'status' => 'pending',
            ],
            [
                'user_id' => $sarah->id,
                'name' => 'Sarah',
                'surname' => 'Smith',
                'id_number' => '9203037003089',
                'leave_type' => 'Family Responsibility',
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->subDays(3),
                'status' => 'rejected',
            ],
            [
                'user_id' => $sarah->id,
                'name' => 'Sarah',
                'surname' => 'Smith',
                'id_number' => '9203037003089',
                'leave_type' => 'Annual Leave',
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 'pending',
            ],
        ];

        foreach ($requests as $req) {
            LeaveRequest::create($req);
        }
    }
}

