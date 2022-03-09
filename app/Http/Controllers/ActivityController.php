<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function overview()
    {
        return view('dashboard.activity.overview', [
            'step' => 1
        ]);
    }
}
