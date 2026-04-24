<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
protected $fillable = [
    'user_id',
    'name',
    'surname',
    'id_number',
    'leave_type',
    'start_date',
    'end_date',
    'status'
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
