<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::insert([
            [
                'title' => 'Finish Laravel Project',
                'description' => 'Complete the routing and controllers chapter implementation.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'title' => 'Write Feature Tests',
                'description' => 'Create tests for index and show routes.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'title' => 'Deploy TaskBoard',
                'description' => 'Push code to GitHub and deploy to server.',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}

