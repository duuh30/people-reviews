<?php

namespace App;

use App\Entities\Department;
use App\Entities\Review;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department_id', 'email', 'password', 'email_verified_at', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'reviewed_id');
    }

    /**
     * @return mixed
     */
    public function pendingReviews()
    {
        return $this->where('id','<>', $this->attributes['id'])
            ->whereNotIn('id', Review::where(['reviewer_id' => $this->attributes['id']])->pluck('reviewed_id'))
            ->get();
    }

    public function reviewed()
    {
        return $this->whereIn('id', Review::where(['reviewer_id' => $this->attributes['id']])->pluck('reviewed_id'))->get();
    }
}
