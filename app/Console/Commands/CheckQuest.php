<?php

namespace App\Console\Commands;

use App\Services\BotService\Quests\QuestActions\CheckQuestTime;
use Illuminate\Console\Command;

class CheckQuest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:quest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверяет прошло ли 5 минут с начала задания';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        (new CheckQuestTime())->timer();
        return 0;
    }
}
