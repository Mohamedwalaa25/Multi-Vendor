<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MakeNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $noti_id=$request->query('notification_id');
        if($noti_id){
            $user=Auth::user();
            if ($user){
                $noti = $user->unreadNotofucations()->find($noti_id);
                if ($noti){
                    $noti->markAsRead();
                }
            }

        }
        return $next($request);
    }
}
