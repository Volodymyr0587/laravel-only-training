<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function get_users_json()
    {
        return User::all();
    }

    public function generateUsersPdf()
    {
        $pdf = Pdf::loadView('pdfs.users', ['users' => User::all()]);
 
        // return $pdf->download(); 
        return $pdf->stream(); 
    }
}
