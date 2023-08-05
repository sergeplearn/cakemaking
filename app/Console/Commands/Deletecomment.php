<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class Deletecomment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deletecomment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('comments')->where('created_at', '<=', Carbon::now()->subDay())->delete();
    }
}
