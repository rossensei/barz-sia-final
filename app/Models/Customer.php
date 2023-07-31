<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'contact',
        'profile_pic',
    ];

    protected $appends = [
        'profile_pic_url'
    ];

    public function getProfilePicUrlAttribute() {
        $url = $this->profile_pic ? asset("images/customers/" . $this->profile_pic) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg';
        return $url;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
