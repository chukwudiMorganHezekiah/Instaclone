<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;

class deletePostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete a post from the database';

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
     * @return mixed
     */
    public function handle()
    {
        $post=Post::where('id',$this->argument('id'))->delete();
        $this->info('post has been deleted successfully');


    }
}
