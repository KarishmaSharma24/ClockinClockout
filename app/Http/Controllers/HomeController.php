<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\User;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = User::where('role_id', 2)->get();
        return view('home', compact('user'));
    }

    public function clockIn(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $attendance = Attendance::where('user_id', $user->id)->whereDate('check_in_time', Carbon::today())->latest('updated_at')->first();
        if ($attendance) {
            if ($attendance->check_out_time) {
                return $this->errorResponse('You are already done clock-in and clock-out', '', 200);
            }
            return $this->errorResponse('employee already clocked-in ', '', 200);
        }
        
        $attendence = new Attendance();
        $attendence->user_id = $user->id;
        $time = Carbon::now();
        $attendence->check_in_time = $time->toDateTimeString();
        return $this->successResponse('user clocked-in successfully', '', 200);
    }

    public function ClockOut(Request $request)
    {

        $time = Carbon::now();
        $currentDateFormatted = $time->toDateString();
        $check_out_time = $time->toDateTimeString();
        $user = User::find(Auth::user()->id);
        $attendance = Attendance::where('user_id', Auth::user()->id)->whereDate('created_at', $currentDateFormatted)->orderBy('id', 'DESC')->first();
        if ($attendance) {
            $attendance->user_id = $user->id;
            $attendance->check_out_time = $check_out_time;
            $attendance->save();
           
            return $this->successResponse('user clocke-out successfully', $data, 200);
        } else {
            $user = User::find(Auth::user()->id);

            $attendance = new attendance();
            $attendance->user_id = Auth::user()->id;
            $time = Carbon::now();
            $timeFormatted = 0;
            $attendance->check_out_time = $time->toDateTimeString();
            
            $attendance->save();

            return $this->successResponse('user clocke-out successfully', '', 200);
        }
        
    }
}
