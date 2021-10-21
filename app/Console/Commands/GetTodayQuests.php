<?php

namespace App\Console\Commands;

use App\Models\Quest;
use Illuminate\Console\Command;

class GetTodayQuests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:quests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получает 3 квеста на сегодня';

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
    public function handle()
    {
        $quests = Quest::whereStatus("active")->get();
        dump("Взял все квесты");
        foreach ($quests as $quest){
            $quest->update(["status"=> "inactive"]);
        }
        dump("Поставил всем квестам неактивно");
        dump("Теперь возьму новые квесты");
        $quests = Quest::whereStatus("inactive")->inRandomOrder()->take(3)->get();
        foreach ($quests as $quest){
            $quest->update(["status"=> "active"]);
        }
        dump("Новые квесты на сегодня выбраны");
        return 0;
    }
}
