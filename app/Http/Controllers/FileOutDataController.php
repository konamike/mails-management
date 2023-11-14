<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FileOutDataController extends Controller
{
    public function sendNotification()
    {
        // $user = User::where("email", request("email"))->first();
        $user = User::first();
        $fileOutData = [
            "body" => "Your received a new message from the office the MD",
            "urltex" => "Visit the NDDC Website",
            "url" => "https://www.nddc.gov.ng",
            "thankyou" => "Thank you for cooperating with us."
        ];

        // $user->notify(new FileOutData($fileOutData));
        // Notification::send($user, new FileOutData($fileOutData));
    }
}
