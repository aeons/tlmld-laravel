<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return Response
     */
    public function dashboard()
    {
        return view('admin.dashboard', ['events' => Event::current()->get()]);
    }
}
