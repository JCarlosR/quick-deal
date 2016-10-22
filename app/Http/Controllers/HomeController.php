<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\ServiceType;
use Illuminate\Http\Request;

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
        return view('dashboard.requirements');
    }
}
