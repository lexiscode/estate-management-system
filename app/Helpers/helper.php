<?php

/** Make Sidebar Active */

function setSidebarActive(array $routes): ?string
{
    foreach($routes as $route){
        if(request()->routeIs($route)){
            return 'active';
        }
    }
    return '';
}


/** check permission */
function hasPermission(array $permissions)
{
    return auth()->guard('admin')->user()->hasAnyPermission($permissions);
}


