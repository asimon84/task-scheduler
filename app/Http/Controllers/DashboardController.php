<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the view for the Dashboard page
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        return view('dashboard', []);
    }

    /**
     * Update tasks' projects and priorities
     *
     * @param Request $request
     *
     * @return bool
     */
    public function updatePriority(Request $request):bool {
        return $request->get('order');
    }
}
