<?php

namespace App\Http\Controllers\HealthCare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class healthCareController extends Controller
{
    function healthCareLogin()
    {

        return view('healthcare.home');
    }
}
