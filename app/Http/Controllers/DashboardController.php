<?php

namespace App\Http\Controllers;

use App\Models\Project;

class DashboardController extends Controller
{
    public function getDashboard()
    {

        return view('pages.dashboard');
    }

    public function getAddUser()
    {
        return view('pages.add-user');
    }

    public function getListUser()
    {
        return view('pages.list-user');
    }
}
