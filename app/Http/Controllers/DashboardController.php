<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user->role === 'employee'){
            $leaveRequests = LeaveRequest::where('user_id',$user->id)->get();
        } else {
            $leaveRequests = LeaveRequest::with('user')->get();
        }

        $leaveBalances = $user->leaveBalances;

        return view('dashboard', compact('leaveRequests','leaveBalances'));
    }
}