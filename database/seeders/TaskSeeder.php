<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            Task::factory()->create([
                'scheduled_to' => now()->addMinutes(rand(1, 60)),
                'is_notified' => true,
            ]);
        }
    }
}
