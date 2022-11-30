<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceTask;
use App\Attendance;
use App\AttendanceLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function autoCheckout(Request $request){
        // var_dump(auth()->user()).die();
        try {

            $check = Attendance::where('status_type','checkin')->get();
            foreach($check as $item){
                $attendance = Attendance::where('user_id',$item->user_id)->where('status_type','checkin')->update([
                    'notes' => 'Checkout Otomatis',
                    'status_type' => 'checkout',
                ]);

                AttendanceLog::create([
                    'user_id' => $item->user_id,
                    'status_type' => 'checkout',
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime,
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => '',
                'message' => 'Success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
