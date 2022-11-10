<?php

namespace App\Http\Middleware;

use App\Jobs\UserStatus;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = User::find(Auth::user()->id);
        // $user->update([
        //     'last_active' => Carbon::now('Asia/Ho_Chi_Minh')
        // ]);
        $updateUserStatus = new UserStatus(Auth::user());
        dispatch($updateUserStatus);
        // dispatch($updateUserStatus)->delay(Carbon::now()->addMinutes(1));


        return $next($request);
    }
}
