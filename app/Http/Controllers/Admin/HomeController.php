<?php

namespace App\Http\Controllers\Admin;

use App\Support\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('admin')) {
            $balances = \App\Models\Admin\Buy::with(['product','fullSale'])->get();
            // dd($balances);
            return view('admin.dashboard', compact('balances'));
        } else {
            return redirect()->route('client');
        }
    }
}
