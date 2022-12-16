<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (auth()->user()->role == 'Admin') {
            $user = User::all();
            return view('citizen.users.index')->with(['user'=>$user]);
        }else if(auth()->user()->role == 'Citizen'){
            $user = User::where('id',Auth::user()->id)->get();
            return view('citizen.users.index')->with(['user'=>$user]);
        }else if(auth()->user()->role == 'Organization'){
            $user = User::where('id',Auth::user()->id)->get();
            return view('citizen.users.index')->with(['user'=>$user]);
        }else{
            return view('citizen.users.index');
        }

    }
}
