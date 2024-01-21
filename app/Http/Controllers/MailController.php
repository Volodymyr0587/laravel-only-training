<?php

namespace App\Http\Controllers;

use App\Jobs\VeryLongJob;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        if ($request->method() === 'POST') {
           VeryLongJob::dispatch()->onQueue('email');
        }
        return view('email.jobtester');
    }
}
