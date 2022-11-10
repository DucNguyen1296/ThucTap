<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MyMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Gate::allows('isAdmin')) {
            return $next($request);
        } elseif (Auth::check() && Gate::allows('isUser')) {
            // dd(Auth::user());
            $user = User::find(Auth::user()->id);
            $user->update([
                'last_active' => Carbon::now('Asia/Ho_Chi_Minh'),
                'status' => 1
            ]);
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
