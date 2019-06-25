<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size='100')
    {
        $hash = md5(strtolower(trim($this->email)));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    //一对多关联模型
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    //获取所有微博
    public function feed()
    {
        return $this->statuses()->orderBy('created_at','desc');
    }

    //获取粉丝
    public function followers()
    {
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }

    //获取关注者
    public function followings()
    {
        return $this->belongsToMany(User::class,'followers','follower_id','user_id');
    }

    //关注
    public function follow($user_ids)
    {
        if(!is_array($user_ids))
        {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids,false);
    }

    //取消关注
    public function unfollow($user_ids)
    {
        if ( ! is_array($user_ids))
        {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    //是否关注
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
}
