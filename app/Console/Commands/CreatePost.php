<?php

namespace App\Console\Commands;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreatePost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Post Data test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Continue?')) {
            set_time_limit(2000000000000000);
            for ($i = 300; $i < 1000000; $i++) {

                // $user = new User();
                // $user->id = $i;
                // $user->email = 'usertest@gmail.com' . strval($i);
                // $user->name = 'user' . strval($i);
                // $user->password = 123;
                // $user->date = NULL;
                // $user->location = 'HaNoi';
                // $user->title = 'Xiao';
                // $user->save();

                $post = new Post();
                $post->id = $i;
                $post->user_id = random_int(1, 10);
                $post->title = 'TESTING DATA';
                $post->post = 'TEST';
                $post->link = NULL;
                $post->link_image = NULL;
                $post->image_name = NULL;
                $post->image_path = NULL;
                $post->save();


                $friend = new Friend();
                $friend->id = $i;
                $friend->user_id = random_int(1, 10);
                $friend->friend_id = random_int(1, 10);
                $friend->approved = 1;
                $friend->save();
            }
        }
    }
}
