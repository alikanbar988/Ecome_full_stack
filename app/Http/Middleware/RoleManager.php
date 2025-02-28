<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return redirect()->route('dashboard');
            }
            $AuthUserRole = Auth::user()->role;
            switch($role)
            {
                case 'admin':
                    if($AuthUserRole == 0){
                        return $next($request);
                        }
                            break;
                            case 'vendor':
                                if($AuthUserRole == 1){
                                    return $next($request);
                                    }
                                        break;
                                        
                                        case 'customer':
                                            if($AuthUserRole == 2)
                                            {
                                                return $next($request);
                                            }
                                             break;
                                                    }
                                  switch($AuthUserRole)
                                  {
                                    case 0:
                                   return redirect()->route('admin');
                                  
                                case 1:
                                     return redirect()->route('vendor');
                                
                                  case 2:
                                    return redirect()->route('dashboard');
                                         
                                             }
                                             return redirect()->route('login');
                                        }
                                


        
}
