<?php

namespace App\Http\Controllers\TaskManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        return view('taskmanager.mail.index');
    }
}
