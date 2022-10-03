<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

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
        // $role = Auth::user()->role_id;
        // if($role == 1){
        //     return view('index');
        // }
        // else if($role == 2){
        //     return view('accueil');
        // }
        // $reservations = Reservation::latest()->paginate(6);
        // return view('welcome', compact('reservations'));
        // // return view('/welcome');
    }
}
