<?php

namespace Tlmld\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Tlmld\Http\Controllers\Controller;
use Tlmld\Models\Event;

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
