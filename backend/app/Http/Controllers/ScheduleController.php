<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ILLuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        return view('schedule', compact('userId'));
    }
}
