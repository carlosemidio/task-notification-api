<?php

namespace App\Console\Commands;

use App\Jobs\NotifyTaskJob;
use App\Models\Task;
use Illuminate\Console\Command;

class CheckTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check tasks that are scheduled to be notified';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('scheduled_to', '<=', now())
            ->where('is_notified', false)
            ->get();

        foreach ($tasks as $task) {
            // Dispatch the job to the queue
            NotifyTaskJob::dispatch($task);
        }

        $this->info('Tasks checked and notifications sent.');
    }
}
