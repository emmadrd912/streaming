<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendmail() {
        $to_name = 'TO_NAME';
        $to_email = 'lucas.mouchague@ynov.com';
        $data = array('name'=>"Sam Jose", "body" => "Test mail");
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('mymonitornawak@gmail.com','Artisans Web');
});
    }
}
