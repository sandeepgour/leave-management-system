<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    
    protected $table = 'leave_types';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    protected $fillable = ['leave_type_name','leave_days','created_at','updated_at'];

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
