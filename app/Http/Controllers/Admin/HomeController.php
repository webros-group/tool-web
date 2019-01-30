<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Admin\AdminController;

class HomeController extends AdminController
{
	public function index()
	{
		return view('admin.home');
	}
}