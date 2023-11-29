<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    public function dashboard(){        
        return view('anakKos.dashboardAnakKos');
    }
}
