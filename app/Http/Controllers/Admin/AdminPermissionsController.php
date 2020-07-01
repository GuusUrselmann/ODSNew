<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }

    public function groups() {
        return view('admin.permissions.groups');
    }

    public function users() {
        return view('admin.permissions.users');
    }
}
