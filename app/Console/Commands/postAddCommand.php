<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class postAddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:add ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add new post to the database';

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
        //

        $postname=$this->ask('What is the company name');
        $description=$this->ask('What is the company description');

        if($this->confirm("Do you want to add the ".$postname)){
            $post=\App\Post::create([
                'postname'=>$postname,
                'postdescription'=>$description

            ]);
            return $this->info($post->postname."has been created");

        }



        $this->warn('nopost added');
    }
}
