<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\LeaveStatusUpdated;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'id_number'=>'required',
            'leave_type'=>'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'attachment'=>'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        LeaveRequest::create([
            'user_id'=>auth()->id(),
            'name'=>$request->name,
            'surname'=>$request->surname,
            'id_number'=>$request->id_number,
            'leave_type'=>$request->leave_type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'attachment'=>$attachmentPath,
            'status'=>'pending'
        ]);

        return back()->with('success','Leave applied');
    }

    public function updateStatus(Request $request,$id)
    {
        if(auth()->user()->role === 'employee') abort(403);

        $leave = LeaveRequest::findOrFail($id);
        $leave->status = $request->status;
        $leave->save();

        if($request->status === 'approved'){
            $days = Carbon::parse($leave->start_date)
                ->diffInDays($leave->end_date)+1;

            $balance = LeaveBalance::where('user_id',$leave->user_id)
                ->where('leave_type',$leave->leave_type)
                ->first();

            if($balance){
                $balance->days_remaining -= $days;
                $balance->save();
            }
        }

        Mail::to($leave->user->email)
            ->send(new LeaveStatusUpdated($leave));

        return back()->with('success','Updated');
    }
}