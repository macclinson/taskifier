<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        $truncated_body = str_limit('The quick brown fox jumps over the lazy dog', 20, ' (...)');
        return view('dashboard', compact('tasks'));
    }
}
