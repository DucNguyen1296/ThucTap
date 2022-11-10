<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking user last_active';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now();
        $users = User::where('status', 1)->where('role', 'user')->get();
        foreach ($users as $user) {
            if (strtotime($today) - strtotime($user->last_active) > 2592000) {
                $user->update([
                    'status' => 0
                ]);
            }
        }
    }
}
