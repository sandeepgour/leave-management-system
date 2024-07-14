<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'department_id',
        'reporting_manager_id',
        'name',
        'email',
        'password',
        'active',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function leaveApprovals()
    {
        return $this->hasMany(LeaveApproval::class, 'approver_id');
    }

    /**
     * Get the user that is the reporting manager.
     */
    public function reportingManager()
    {
        return $this->belongsTo(User::class, 'reporting_manager_id');
    }

    /**
     * Get the users that report to this manager.
     */
    public function subordinates()
    {
        return $this->hasMany(User::class, 'reporting_manager_id');
    }

    public static function storeResource($params)
    {
        return self::create($params);
    }

    public static function updateResource($params, $id)
    {
        $data = self::where('id', $id)->first();
        if ($data) {
            $data->update($params);
        }
        return $data;
    }

}
