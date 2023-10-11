<?php

namespace App\Http\Controllers;

use App\Models\Claim\Claim;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $claims = Claim::with(['insured', 'handler'])
        ->orderBy('created_at', 'desc')
        ->limit(5)->get();
        return view('home', compact('claims'));
    }
}
