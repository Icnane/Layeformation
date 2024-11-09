<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteAnswers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:answers';  // Spécifiez le nom de la commande ici

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all answers from the answers table';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('answers')->delete();
        $this->info('All answers have been deleted.');
    }
}
