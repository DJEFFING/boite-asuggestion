<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notification_1 =[
            "description" => "notifiation1",
            "user_id" => 1,
          
        ];

        $notification_2 =[
            "description" => "notifiation1",
            "user_id" => 1,
          
        ];

        $notification_3 =[
            "description" => "notifiation1",
            "user_id" => 1,
          
        ];

        $notification_4 =[
            "description" => "notifiation1",
            "user_id" => 1,
          
        ];

        $notification_5 =[
            "description" => "notifiation1",
            "user_id" => 1,
          
        ];

        Notification::create($notification_1);
        Notification::create($notification_2);
        Notification::create($notification_3);
        Notification::create($notification_4);
        Notification::create($notification_5);
    }
}
