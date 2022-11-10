<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Post Using Schedule';


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
        $post = new Post();
        $post->user_id = random_int(1, 10);
        $post->title = 'POST Schedule';
        $post->post = 'TEST POST Schedule';
        $post->link = NULL;
        $post->link_image = NULL;
        $post->image_name = NULL;
        $post->image_path = NULL;
        $post->save();
    }
}
