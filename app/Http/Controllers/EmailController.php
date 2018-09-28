<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Config;
use Mail;
class EmailController extends Controller
{
    //
    public function kirim()
    {
        $data = ['prize' => 'Peke', 'total' => 3 ];
        Config::set('mail.driver', 'smtp');
        Config::set('mail.host', 'smtp.gmail.com');
        Config::set('mail.port', 587);
        Config::set('mail.username', 'baznaskota.bogor@baznas.or.id');
        Config::set('mail.password', 'baznasbogor17');
        // "emails.hello" adalah nama view.
        Mail::send('email.hello', $data, function ($mail)
        {
            // $mail->username('fachran.nazarullah@gmail.com');  
            // $mail->password('2707itachi!@#$%^');  
            $mail->to('fachran.nazarullah@gmail.com', 'Fachran Nazarullah');
            $mail->from('baznaskota.bogor@baznas.or.id', 'BAZNAS Kota Bogor');
            $mail->subject('Hello World!');
            // echo '<pre>';
            // print_r($mail);
            // echo '</pre>';
        });
    }
}
