<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Reminder;
class MailController extends Controller
{
    public function testMail()
    {
        $mail = 'krishnaborad95@gmail.com';
        Mail :: to($mail)->send( new Reminder );
        dd('Mail  Successfully sent');
    }
}
