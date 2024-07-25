<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $silder = Slider::get();
        return view('clients.home', compact('silder'));
    }
}
