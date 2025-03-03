<?php

use App\Models\NotificationAdmin;

if(!function_exists('findAdminNotification')){
    function findAdminNotification(){
        $adminNotification = NotificationAdmin::all();
        return $adminNotification;
    }
}
