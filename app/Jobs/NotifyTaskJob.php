<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotifyTaskJob implements ShouldQueue
{
    use Queueable;

    protected $task;

    /**
     * Create a new job instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            Log::info('Notifying task', [
                'id' => $this->task->id,
                'title' => $this->task->title,
                'description' => $this->task->description,
                'is_notified' => $this->task->is_notified,
                'created_at' => $this->task->created_at,
                'updated_at' => $this->task->updated_at,
            ]);

            $this->task->update(['is_notified' => true]);
        });
    }
}
