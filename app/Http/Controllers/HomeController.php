<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = ServiceType::all();
        return view('home')->with(compact('types'));
    }

    public function requirements()
    {
        $requirements = Auth::user()->requirements;
        return view('dashboard.requirements')->with(compact('requirements'));
    }
}
