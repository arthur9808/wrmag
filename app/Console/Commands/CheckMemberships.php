<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CheckMemberships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:memberships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check memberships';

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
        $text = "[" . date("Y-m-d H:i:s") . "]" . 'Check memberships';
        Storage::append('file_memverships.txt', $text);
    }
}
