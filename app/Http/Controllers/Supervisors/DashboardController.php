<?php

namespace App\Http\Controllers\Supervisors;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function overview()
    {
        return view('dashboard.supervisors.overview');
    }
}
