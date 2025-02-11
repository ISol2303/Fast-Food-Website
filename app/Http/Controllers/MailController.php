<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail; // Import facade Mail

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'This is sample Email',
            'body'  => 'This is for testing email using sample smtp'
        ];

        Mail::to('420isol7@gmail.com')->send(new SampleMail($details));

        return "Email sent successfully!";
    }
}