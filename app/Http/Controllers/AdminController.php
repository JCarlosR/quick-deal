<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $providers = User::where('provider', true)->get();
        return view('providers.index')->with(compact('providers'));
    }

    public function store()
    {

    }
}
