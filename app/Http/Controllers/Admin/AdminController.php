<?php

namespace Tlmld\Http\Controllers\Admin;

use Tlmld\Models\Event;
use Tlmld\Http\Controllers\Controller;
use Tlmld\Http\Requests;
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
