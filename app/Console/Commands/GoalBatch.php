<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoalService;

class GoalBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:goal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command:Goal start';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GoalService $goalService)
    {
        parent::__construct();
        $this->goalService = $goalService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $goals = $this->goalService->setGoalsExpired();
        return 0;
    }
}
