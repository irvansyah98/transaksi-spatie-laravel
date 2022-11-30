<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;

class DashboardController extends Controller
{

	public function index() {
		
		$data['user'] = User::get();
		$data['total_transaksi'] = Order::whereDate('created_at',date('Y-m-d'))->count();

		return view('backend.pages.dashboard.index',$data);
	}

}
