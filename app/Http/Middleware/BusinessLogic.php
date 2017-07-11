<?php

namespace App\Http\Middleware;

use Closure;

class BusinessLogic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
        $routeArray = $request->route()->getAction(); 
        $controllerAction = class_basename($routeArray["controller"]);
        list($controller, $action) = explode("@", $controllerAction);
        $strRedirect =  $this->getRedirect($controller, $action, $request->session()->get("role"));
        if ($strRedirect==""){
            return $next($request);
        }else{
            return redirect($strRedirect);
        }       
        
    }

    public function getRedirect($controller, $action, $role){
        $strRedirect = "";        
        if ($role=="staff"){
            if ($controller == "UserController" && $action=="getList"){
                $strRedirect = "/transaction";
            }else if ($controller == "CustomerController" || $controller == "ReportController"){
                $strRedirect = "/transaction";
            }
        }
        return $strRedirect;

    }
}
